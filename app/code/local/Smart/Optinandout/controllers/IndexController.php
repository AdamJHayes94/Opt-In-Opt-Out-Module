<?php
class Smart_Optinandout_IndexController extends Mage_Core_Controller_Front_Action
{
    public function optinandoutAction()
    {
        $subscription = $this->getRequest()->getPost('opt_selection');
        if($subscription== 1)
        {
            Mage::getSingleton('core/session')->setEmailSubscribed(1);
        }
        else
        {
            Mage::getSingleton('core/session')->setEmailSubscribed(0);
        }
    }
}