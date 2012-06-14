<?php

/** This file is part of KCFinder project
  *
  *      @desc Autoload classes magic function
  *   @package KCFinder
  *   @version 2.21
  *    @author Pavel Tzonkov <pavelc@users.sourceforge.net>
  * @copyright 2010 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

function __autoload($class) {
	$dirname = dirname(__FILE__);
	
    if ($class == "uploader")
        require $dirname. "/uploader.php";
    elseif ($class == "browser")
        require $dirname. "/browser.php";
    elseif (file_exists($dirname. "/types/$class.php"))
        require $dirname. "/types/$class.php";
    elseif (file_exists($dirname. "/../lib/class_$class.php"))
        require $dirname. "/../lib/class_$class.php";
    elseif (file_exists($dirname. "/../lib/helper_$class.php"))
        require $dirname. "/../lib/helper_$class.php";
}

?>