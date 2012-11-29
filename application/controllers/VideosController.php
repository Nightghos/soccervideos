<?php

class VideosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        // action body
        $form = new Application_Form_Addvideo();
        if (!$this->getRequest()->isPost())
		{
			$this->view->form =  $form;
		}
		else 
		{
			$data = $this->getRequest()->getPost();
			
			$video['embed_code'] = $data['embed_code'];
			$video['posted'] = time();
			$video['title'] = $data['title'];
			$video['description'] = $data['description'];
			$video['thumb'] = $data['thumb'];
			
			$videos_table = new Application_Model_Videos();
			$videos_table->newVideo($video);
					
		}
		
    }

    public function scrapperAction()
    {
        // action body
       $this->_helper->layout->disableLayout();
       $this->_helper->viewRenderer->setNoRender(true);
       
       if ($videourl = $this->getRequest()->getParam('videourl'))
       {
			$video_model = new Application_Model_Videos();
			if (strpos($videourl,'youtube'))
				$json_body = $video_model->getYoutubeInfo($videourl);
				
				
			header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT"); 
			header("Cache-Control: no-cache, must-revalidate"); 
			header("Pragma: no-cache");
			header("Content-type: application/json");
			echo $json_body;
	    }
    }


}





