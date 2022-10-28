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
class VersionController extends ApiControllerBase
{
    /**
     * retrieve version description
     * @return version description
     * @throws \HWasly\Base\ModelException
     * @throws \ReflectionException
     */
    public function getAction()
    {
        $backend = new Backend();
        return $backend->configdRun("crowdsec version");
    }
}
