<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        
		
		
        
    }

    public function indexAction()
    {
        // action body
        $mVideos = new Application_Model_Videos();
		$results = $mVideos->getLast();
		
		$this->view->videos = $results;
	
    }


}

