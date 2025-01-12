<?php

/*
 * Copyright (C) 2017 Michael Muenz <m.muenz@gmail.com>
 * Copyright (C) 2018 Fabian Franz
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace HWasly\Postfix\Api;

use HWasly\Base\ApiMutableModelControllerBase;

class DomainController extends ApiMutableModelControllerBase
{
    protected static $internalModelName = 'domain';
    protected static $internalModelClass = '\HWasly\Postfix\Domain';

    public function searchDomainAction()
    {
        return $this->searchBase('domains.domain', array("enabled", "domainname", "destination"));
    }

    public function getDomainAction($uuid = null)
    {
        return $this->getBase('domain', 'domains.domain', $uuid);
    }

    public function addDomainAction()
    {
        return $this->addBase('domain', 'domains.domain');
    }

    public function delDomainAction($uuid)
    {
        return $this->delBase('domains.domain', $uuid);
    }

    public function setDomainAction($uuid)
    {
        return $this->setBase('domain', 'domains.domain', $uuid);
    }

    public function toggleDomainAction($uuid)
    {
        return $this->toggleBase('domains.domain', $uuid);
    }
}
