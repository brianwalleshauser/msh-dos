<?php
/**
 * Created by PhpStorm.
 * User: bwalleshauser
 * Date: 2/11/2015
 * Time: 2:14 PM
 */

class Mainstreethost_DynamicOriginShipping_Model_States extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        /**
         * This tells Magento where the related resource model can be found.
         *
         * For a resource model, Magento will use the standard model alias -
         * in this case 'dos' - and look in
         * config.xml for a child node <resourceModel/>. This will be the
         * location that Magento will look for a model when
         * Mage::getResourceModel() is called
         * .
         */
        $this->_init('dos/states');
    }

    /**
     * This method is used in the grid and form for populating the dropdown.
     */

    protected function _beforeSave()
    {
        parent::_beforeSave();
        return $this;
    }
}