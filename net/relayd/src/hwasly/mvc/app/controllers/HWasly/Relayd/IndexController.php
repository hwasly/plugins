<?php

/**
 *    Copyright (C) 2018 EURO-LOG AG
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

namespace HWasly\Relayd;

/**
 * Class IndexController
 * @package HWasly\Relayd
 */
class IndexController extends \HWasly\Base\IndexController
{
    /**
     * relayd index page
     * @throws \Exception
     */
    public function indexAction()
    {
        $this->view->formGeneralSettings         = $this->getForm("general");
        $this->view->formDialogEditHost          = $this->getForm("host");
        $this->view->formDialogEditTableCheck    = $this->getForm("tablecheck");
        $this->view->formDialogEditTable         = $this->getForm("table");
        $this->view->formDialogEditProtocol      = $this->getForm("protocol");
        $this->view->formDialogEditVirtualServer = $this->getForm("virtualserver");
        $this->view->pick('HWasly/Relayd/index');
    }
}
