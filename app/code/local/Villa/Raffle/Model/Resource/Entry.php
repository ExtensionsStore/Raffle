<?php

/**
 * 
 * @category    Villa
 * @package     Villa_Raffle
 * @author      Villa <david.tay20@gmail.com>
 */

class Villa_Raffle_Model_Resource_Entry extends Mage_Core_Model_Resource_Db_Abstract {
	
    protected function _construct()
    {
        $this->_init('raffle/entry', 'id');
    }
	
}
