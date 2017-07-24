<?php

class Smart_Optinandout_Model_Resource_Optinandout_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct() {
        $this->_init('optinandout/optinandout');
    }
}