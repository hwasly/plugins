<?php

/**
 *    Copyright (C) 2020 Deciso B.V.
 *
 *    All rights reserved.
 *
 *    Redistribution and use in source and binary forms, with or without
 *    modification, are permitted provided that the following conditions are met:
 *
 *    1. Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *    2. Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 *    THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
 *    INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 *    AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *    AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 *    OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 *    SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 *    INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 *    CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 *    ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 *    POSSIBILITY OF SUCH DAMAGE.
 *
 */

namespace HWasly\Firewall\FieldTypes;

use HWasly\Base\FieldTypes\ArrayField;
use HWasly\Base\FieldTypes\ContainerField;

/**
 * Class SourceNatRuleContainerField
 * @package HWasly\Firewall\FieldTypes
 */
class SourceNatRuleContainerField extends ContainerField
{
    /**
     * map source nat rules
     * @return array
     */
    public function serialize()
    {
        $result = [];
        $source_mapper = [
            'enabled' => false,
            'source_net' => false,
            'source_not' => false,
            'source_port' => 'sourceport',
            'destination_net' => false,
            'destination_not' => false,
            'destination_port' => 'dstport',
            'target_port' => 'natport',
            'description' => 'descr'
        ];
        // 1-on-1 map (with type conversion if needed)
        foreach ($this->iterateItems() as $key => $node) {
            $target_fieldname = isset($source_mapper[$key]) ? $source_mapper[$key] : $key;
            if ($target_fieldname) {
                if (is_a($node, "HWasly\\Base\\FieldTypes\\BooleanField")) {
                    $result[$target_fieldname] = !empty((string)$node);
                } elseif (is_a($node, "HWasly\\Base\\FieldTypes\\ProtocolField")) {
                    if ((string)$node != 'any') {
                        $result[$target_fieldname] = (string)$node;
                    }
                } else {
                    $result[$target_fieldname] = (string)$node;
                }
            }
        }

        $result['disabled'] = empty((string)$this->enabled);
        // source / destination mapping, doesn't use port construct like it would for rules.
        $result['source'] = array();
        if (!empty((string)$this->source_net)) {
            $result['source']['network'] = (string)$this->source_net;
            if (!empty((string)$this->source_not)) {
                $result['source']['not'] = true;
            }
        }
        $result['destination'] = array();
        if (!empty((string)$this->destination_net)) {
            $result['destination']['network'] = (string)$this->destination_net;
            if (!empty((string)$this->destination_not)) {
                $result['destination']['not'] = true;
            }
        }

        return $result;
    }
}

/**
 * Class SourceNatRuleField
 * @package HWasly\Firewall\FieldTypes
 */
class SourceNatRuleField extends ArrayField
{
    /**
     * @inheritDoc
     */
    public function newContainerField($ref, $tagname)
    {
        $container_node = new SourceNatRuleContainerField($ref, $tagname);
        $parentmodel = $this->getParentModel();
        $container_node->setParentModel($parentmodel);
        return $container_node;
    }
}
