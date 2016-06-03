<?php

/**
 * 
 * @category    Villa
 * @package     Villa_Raffle
 * @author      Villa <david.tay20@gmail.com>
 */
class Villa_Raffle_Model_Entry extends Mage_Core_Model_Abstract {
	/**
	 * Initialize resource model
	 */
	protected function _construct() {
		parent::_construct ();
		
		$this->_init ( 'raffle/entry' );
	}
	

}