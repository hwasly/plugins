<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace HWasly\CrowdSec\Api;

use HWasly\Base\ApiMutableModelControllerBase;

/**
 * @package HWasly\CrowdSec
 */
class GeneralController extends ApiMutableModelControllerBase
{
    protected static $internalModelName = 'general';
    protected static $internalModelClass = '\HWasly\CrowdSec\General';
}
