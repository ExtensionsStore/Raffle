<?php

/**
 * 
 * @category    Villa
 * @package     Villa_Raffle
 * @author      Villa <david.tay20@gmail.com>
 */

class Villa_Raffle_Model_Resource_Entry_Collection 
    extends Mage_Core_Model_Resource_Db_Collection_Abstract 
{

    protected function _construct()
    {
        parent::_construct();
        
        $this->_init('raffle/entry');
    }

}