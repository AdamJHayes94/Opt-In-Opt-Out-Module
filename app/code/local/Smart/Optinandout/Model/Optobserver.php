<?php

class Smart_Optinandout_Model_Optobserver
{

    public function new_order_optinservice($observer)
    {
        try {
            $order = $observer->getEvent()->getOrder();
            $customer_id = $order->getCustomerId();
            $email = $order->getCustomerEmail();
            $name = ucfirst($order->getCustomerName());
            $opt_session = Mage::getSingleton('core/session')->getEmailSubscribed();
            $opt_service = Mage::getModel('optinandout/optinandout');
            $opt_serviceselect = Mage::getModel('optinandout/optinandout')->load($email, 'email_address');
            if (!$opt_session) {
                if ($opt_serviceselect->getEmailAddress() != $email):
                    $opt_service->setEmailAddress($email);
                    $opt_service->setCustomerName($name);
                    $opt_service->setOptStatus(1);
                    $opt_service->save();
                    Mage::getSingleton('core/session')->setEmailSubscribed(0);
                else:
                    $opt_serviceselect->setOptStatus(1);
                    $opt_serviceselect->save();
                    Mage::getSingleton('core/session')->setEmailSubscribed(0);
                endif;
            } else {
                if ($opt_serviceselect->getEmailAddress() != $email):
                    $opt_service->setEmailAddress($email);
                    $opt_service->setCustomerName($name);
                    $opt_service->setOptStatus(0);
                    $opt_service->save();
                    Mage::getSingleton('core/session')->setEmailSubscribed(0);
                else:
                    $opt_serviceselect->setOptStatus(0);
                    $opt_serviceselect->save();
                    Mage::getSingleton('core/session')->setEmailSubscribed(0);
                endif;
            }
        } catch (exception $e) {
            Mage::log($e->getMessage(), null, 'Smart_Optinandout_Model_Optobserver.log');
        }

        return true;
    }
}