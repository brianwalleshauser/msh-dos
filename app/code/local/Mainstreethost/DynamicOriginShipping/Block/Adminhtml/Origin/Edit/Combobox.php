<?php
/**
 * Created by PhpStorm.
 * User: bwalleshauser
 * Date: 2/12/2015
 * Time: 3:34 PM
 */

class Mainstreethost_DynamicOriginShipping_Block_Adminhtml_Origin_Edit_Combobox extends Mage_Core_Block_Template
{
    protected $originId;

    protected function _construct()
    {
        parent::_construct();

        $this->originId = Mage::registry('current_origin')->getEntityId();
        $this->setTemplate('dos/combobox.phtml');
    }

    public function GetRemainingRegions()
    {
        return Mage::helper('dos')->GetRemainingRegions();
    }


    public function GetAssignedRegions()
    {
        return Mage::helper('dos')->GetAllAssignedRegions($this->originId);
    }



}