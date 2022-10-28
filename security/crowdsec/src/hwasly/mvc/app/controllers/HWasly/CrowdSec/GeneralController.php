<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace HWasly\CrowdSec;

/**
 * Class GeneralController
 * @package HWasly\CrowdSec
 */
class GeneralController extends \HWasly\Base\IndexController
{
    public function indexAction()
    {
        $this->view->pick('HWasly/CrowdSec/general');
        $this->view->generalForm = $this->getForm("general");
    }
}
