<?php

/**
 * 
 * @category    Villa
 * @package     Villa_Raffle
 * @author      Villa <david.tay20@gmail.com>
 */

$this->startSetup();

$this->run("CREATE TABLE IF NOT EXISTS {$this->getTable('villa_raffle_entry')} (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `city` VARCHAR(50) NOT NULL, 
  `state` VARCHAR(50) NOT NULL,
  `postcode` VARCHAR(50) NOT NULL,
  
  `location` VARCHAR(50) NOT NULL,
  `shoe_size` DECIMAL(10,2) NOT NULL,
  
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY ( `id` ),
  UNIQUE KEY ( `email` )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$this->endSetup();