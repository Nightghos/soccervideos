<?php

class Application_Form_Addvideo extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        
		$this->setMethod('post');
        
		$title = $this->createElement('text','title');
		$title->setLabel('Title:')
				->setAttrib('size',150);
		$this->addElement($title);
		
		$thumb = $this->createElement('text','thumb');
		$thumb->setLabel('Thumbnail:')
				->setAttrib('size',150);
		$this->addElement($thumb);
		
		$description = $this->createElement('textarea','description');
		$description->setLabel('Description:')
			->setAttrib('class','span8')
			->setAttrib('cols',80)
			->setAttrib('rows',3);
		$this->addElement($description);
		
		$embeded = $this->createElement('textarea','embed_code');
		$embeded->setLabel('Embedded Code:')
			->setAttrib('class','span8')
			->setAttrib('cols',80)
			->setAttrib('rows',3);
		$this->addElement($embeded);
		
		$submit = $this->createElement('submit','submit');
		$submit->setAttrib('class','btn btn-primary');
		$this->addElement($submit);		
    }


}

