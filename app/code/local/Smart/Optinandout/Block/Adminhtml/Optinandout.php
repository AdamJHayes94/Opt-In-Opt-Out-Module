<?php

/**
 * @category   Smart
 * @package    Smart_Optinandout
 * @author     Kishore
 */

class Smart_Optinandout_Block_Adminhtml_Optinandout extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'optinandout';
        $this->_controller = 'adminhtml_optinandout';
        $this->_headerText = Mage::helper('optinandout')->__('Smart Opt-in Service');
        parent::__construct();
        $this->_removeButton('add');
    }
}