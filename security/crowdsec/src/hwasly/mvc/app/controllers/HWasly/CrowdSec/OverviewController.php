<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace HWasly\CrowdSec;

/**
 * Class OverviewController
 * @package HWasly\CrowdSec
 */
class OverviewController extends \HWasly\Base\IndexController
{
    public function indexAction()
    {
        $this->view->pick('HWasly/CrowdSec/overview');
    }
}
