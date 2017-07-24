<?php

class Smart_Optinandout_Adminhtml_SmartoptinoutserviceController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('optinandout/optinandout');
    }

    public function indexAction()
    {
        $this->_title($this->__('Smart Opt-in Service'))
            ->loadLayout()
            ->_setActiveMenu('smart/smart_optinandout')
            ->_addContent($this->getLayout()->createBlock('optinandout/adminhtml_optinandout'))
            ->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('optinandout/adminhtml_optinandout_grid')->toHtml()
        );
    }

    public function exportSmartCsvAction()
    {
        $fileName = 'smart_optin.csv';
        $grid = $this->getLayout()->createBlock('optinandout/adminhtml_optinandout_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportSmartExcelAction()
    {
        $fileName = 'smart_optin.xml';
        $grid = $this->getLayout()->createBlock('optinandout/adminhtml_optinandout_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }


}