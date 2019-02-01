<?php

/**
 * Configure.php File
 *
 *
 * @author Marian-Daniel Ursache <marian_ursache@yahoo.co.uk>
 * @version 1.0
 */

namespace lepiaf\SerialPort;

use Tivie\OS\Detector;
use lepiaf\SerialPort\Configure\TTYConfigure;
use lepiaf\SerialPort\Configure\TTYMacConfigure;
use lepiaf\SerialPort\Configure\ModeConfigure;

/**
 * Configure Class
 * @author marian
 *
 */
class Configure
{
    /**
     * Get configure class instance based on os
     *
     * @return ConfigureInterface
     */
    public static function getInstance()
    {
        $instance = null;
        $osDetect = new Detector();
        switch(true) {
            case $osDetect->isOSX():
                $instance = new TTYMacConfigure();
                break;
            case $osDetect->isWindowsLike():
                $instance = new ModeConfigure();
                break;
            default:
                $instance = new TTYConfigure();
                break;
        }

        return $instance;
    }
}

