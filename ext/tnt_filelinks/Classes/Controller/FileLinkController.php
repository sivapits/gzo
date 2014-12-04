<?php

namespace TYPO3\TntFilelinks\Controller;

use TYPO3\TntFilelinks\Domain\Model;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Abin Sabu <abin.s@tnt-graphics.com>, TNT-Graphics
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * FileLinkController
 */
class FileLinkController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    protected $fileListModel;

    public function __construct() {
        $this->fileListModel = new \TYPO3\TntFilelinks\Domain\Model\FileLink();
    }

    /**
     * action list
     *
     * @return void
     */
    public function filelistAction() {
        $this->cObj = $this->configurationManager->getContentObject();
        $flexSettings = $this->settings;
        $pageOptions['headerLabel'] = $this->cObj->data['header'];
        $fileLinks = $this->fileListModel->doGetFiles($flexSettings['docFiles']);
        $pageOptions['randNumber'] = time();
        foreach ($fileLinks as $key => $value) {
            $singleInformations[$key]['identifier'] = $value['uid_local'];
            $singleInformations[$key]['filelink'] = $value['identifier'];
            $singleInformations[$key]['size'] = $this->doReturnFileSize($value['size']);
            $extension = substr($value['extension'], 0, 3);
            //$extension = ($extension == 'doc') ? 'word' : $extension;
            $singleInformations[$key]['extension'] = $extension;
            $singleInformations[$key]['title'] = $value['title'];
            $singleInformations[$key]['description'] = $value['description'];
        }
        if ($flexSettings['view_type'] == 'inhalt') {
            $this->view->setTemplatePathAndFilename('typo3conf/ext/tnt_filelinks/Resources/Private/Templates/FileLink/Inhalt.html');
        }
        $this->view->assign('pageOptions', $pageOptions);
        $this->view->assign('fileLinks', $singleInformations);
    }

    /**
     * action file
     *
     * @return void
     */
    public function fileAction() {
        $request = $this->request->getArguments();
        $path = $this->fileListModel->doGetFile($request);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($path));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        exit;
    }

    /**
     * The doReturnFileSize method of the PlugIn
     *
     * @param int  $subsidiary_id: The PlugIn configuration
     * @return The content that is displayed on the website
     */
    public function doReturnFileSize($fileSize) {
        if ($fileSize > 0) {
            $unit = intval(log($fileSize, 1024));
            $units = array('B', 'KB', 'MB', 'GB');
            if (array_key_exists($unit, $units) === true) {
                return sprintf('%d %s', $fileSize / pow(1024, $unit), $units[$unit]);
            }
        }
        return $fileSize;
    }

}
