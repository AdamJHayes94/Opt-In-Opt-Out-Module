<?php

class Smart_Optinandout_Model_Optinandout extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('optinandout/optinandout');
    }
}