<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace HWasly\CrowdSec\Api;

use HWasly\Base\ApiControllerBase;
use HWasly\CrowdSec\CrowdSec;
use HWasly\Core\Backend;

/**
 * @package HWasly\CrowdSec
 */
class ParsersController extends ApiControllerBase
{
    /**
     * retrieve list of registered parsers
     * @return array of parsers
     * @throws \HWasly\Base\ModelException
     * @throws \ReflectionException
     */
    public function getAction()
    {
        $backend = new Backend();
        $bckresult = json_decode(trim($backend->configdRun("crowdsec parsers-list")), true);
        if ($bckresult !== null) {
            // only return valid json type responses
            return $bckresult;
        }
        return array("message" => "unable to list parsers");
    }
}
