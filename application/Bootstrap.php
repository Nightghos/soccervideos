<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initDefineConstants()
	{
	    $constantFile = APPLICATION_PATH . '/configs/constants.ini';
	    $iniParser = new Zend_Config_Ini($constantFile);
		// JUST TO STASH SOME STUFF ON TESTING	
	    foreach ($iniParser->toArray() as $constName => $constantVal) {
	        define($constName, $constantVal);
	    }
	}
	
	
}

