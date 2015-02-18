<?php
/**
 * Created by PhpStorm.
 * User: bwalleshauser
 * Date: 2/17/2015
 * Time: 1:13 PM
 */ 
class Mainstreethost_DynamicOriginShipping_Block_Checkout_Cart_Shipping extends Mage_Checkout_Block_Cart_Shipping
{
    public function getEstimateRates()
    {
        Mage::dispatchEvent('msh_dos_shipping', array('address' => $this->getAddress()));

        $dafhdah = Mage::getStoreConfig('shipping/origin/postcode');

        if (empty($this->_rates)) {
            $groups = $this->getAddress()->getGroupedAllShippingRates();
            $this->_rates = $groups;
        }
        return $this->_rates;
    }
}