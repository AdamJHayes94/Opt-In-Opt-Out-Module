<?php

class Smart_Optinandout_Block_Adminhtml_Optinandout_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('id');
        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('optinandout/optinandout')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('optinandout');
        $this->addColumn('id', array(
            'header'    => $helper->__('ID'),
            'width'     => '50px',
            'align'     =>'left',
            'index'     => 'id',
            'type'  => 'number',
        ));
        
        $this->addColumnAfter('customer_name', array(
            'header'    => $helper->__('Customer Name'),
            'align'     =>'left',
            'width'     => '150px',
            'index'     => 'customer_name',
        ),'order_id');

        $this->addColumnAfter('email_address', array(
            'header'    => $helper->__('Customer Email'),
            'align'     =>'left',
            'width'     => '200px',
            'index'     => 'email_address'
        ),'customer_name');

        $this->addColumnAfter('opt_status', array(
            'header'    => $helper->__('Opt Status'),
            'align'     =>'left',
            'width'     => '50px',
            'type'      =>  'options',
            'index'     => 'opt_status',
            'options' 	=> array(1 => 'Yes', 0 => 'No'),
        ),'email_address');

        $this->addExportType('*/*/exportSmartCsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportSmartExcel', $helper->__('Excel XML'));

        return parent::_prepareColumns();
    }
    public function _filterIsSaleItem(Mage_Eav_Model_Entity_Collection_Abstract $collection, Mage_Adminhtml_Block_Widget_Grid_Column $column)
    {
        $value = $column->getFilter()->getValue();

        if($value == 'Yes')
        {
            $collection->addAttributeToFilter('opt_in_out', array('eq' => 0));
        }
        if($value == 'No')
        {
            $collection->addAttributeToFilter('opt_in_out', array('gt' => 0));
        }
    }
}