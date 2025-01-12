<?php

/**
 *    Copyright (C) 2016 Frank Wall
 *    Copyright (C) 2015 Deciso B.V.
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

namespace HWasly\HAProxy\Api;

use HWasly\Base\ApiMutableServiceControllerBase;
use HWasly\Core\Backend;
use HWasly\HAProxy\HAProxy;

/**
 * Class ServiceController
 * @package HWasly\HAProxy
 */
class ServiceController extends ApiMutableServiceControllerBase
{
    protected static $internalServiceClass = '\HWasly\HAProxy\HAProxy';
    protected static $internalServiceTemplate = 'HWasly/HAProxy';
    protected static $internalServiceEnabled = 'general.enabled';
    protected static $internalServiceName = 'haproxy';

    /**
     * run syntax check for haproxy configuration
     * @return array
     * @throws \Exception
     */
    public function configtestAction()
    {
        $backend = new Backend();
        // first generate template based on current configuration
        $backend->configdRun('template reload HWasly/HAProxy');
        // finally run the syntax check
        $response = $backend->configdRun("haproxy configtest");
        return array("result" => $response);
    }

    /**
     * reconfigure force restart check, return zero for soft-reload
     */
    protected function reconfigureForceRestart()
    {
        return 0;
    }
}
