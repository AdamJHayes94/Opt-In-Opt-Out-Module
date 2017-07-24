<?php

class Smart_Optinandout_Model_Resource_Optinandout extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('optinandout/optinandout', 'id');
    }
}