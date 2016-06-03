<?php

/**
 * Raffle 
 * 
 * @category    Villa
 * @package     Villa_Raffle
 * @author      Villa <david.tay20@gmail.com>
 */
class Villa_Raffle_IndexController extends Mage_Core_Controller_Front_Action {
	public function indexAction() {
		$session = Mage::getSingleton ( 'core/session' );
		if (! $this->_validateFormKey ()) {
			
			$session->addError ( $this->__ ( 'Invalid form key.' ) );
			$this->_redirectReferer ();
			return;
		}
		
		$post = $this->getRequest ()->getPost ();
		
		if ($post) {
			
			$dataObj = new Varien_Object ();
			$dataObj->setData ( $post );
			$name = $dataObj->getName ();
			$email = $dataObj->getEmail ();
			$address = $dataObj->getAddress ();
			$city = $dataObj->getCity ();
			$state = $dataObj->getState ();
			$postcode = $dataObj->getPostcode ();
			$location = $dataObj->getLocation ();
			$shoeSize = $dataObj->getShoeSize ();
			
			if ($name && filter_var ( $email, FILTER_VALIDATE_EMAIL ) && $address && $city && $state && $postcode && $location && $shoeSize) {
				
				try {
					
					$entry = Mage::getModel ( 'raffle/entry' );
					$entry->load($email,'email');
					
					if (!$entry->getId()){
						
						$data = $dataObj->getData();
						$datetime = date('Y-m-d H:i:s');
						$data['created_at'] = $datetime;
						$data['updated_at'] = $datetime;
						$entry->setData($data);
						$entry->save();
						$session->addSuccess($this->__('Your entry has been submitted.'));
						
					} else {
						$session->addError ( $this->__ ( 'Your entry has already been submitted' ) );
					}
				
				} catch ( Exception $e ) {
					
                	$session->addException($e, $this->__('There was a problem with your submission: %s', $e->getMessage()));
				}
			} else {
				
				$session->addError ( $this->__ ( 'Empty or invalid form data.' ) );
			}
		} else {
			
			$session->addError ( $this->__ ( 'No form data.' ) );
		}
	
		$this->_redirectReferer ();
	}
}