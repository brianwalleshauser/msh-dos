<?php
/**
 * Created by PhpStorm.
 * User: bwalleshauser
 * Date: 2/11/2015
 * Time: 2:12 PM
 */ 
class Mainstreethost_DynamicOriginShipping_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function GetRegions($grid)
    {
        $USRegions = Mage::getSingleton('dos/origin')->GetStates('US');
        $CNRegions = Mage::getSingleton('dos/origin')->GetStates('CA');
        $regions = $USRegions->getItems() + $CNRegions->getItems();

        $regionArray = array();

        foreach($regions as $region)
        {
            if($grid)
            {
                $regionArray[$region->getCode()] = $region->getName();
            }
            else
            {
                array_push($regionArray, array(
                    'value'     => $region->getCode(),
                    'label'     => $region->getName()
                ));
            }
        }

        return $regionArray;
    }


    public function GetRemainingRegions()
    {
        $regionArray = array();
        $allAssignedRegions = Mage::getResourceModel('dos/states_collection')->addFieldToFilter('originId',array('neq' => 0))->load()->getItems();
        $allRegions = $this->GetRegions(FALSE);

        if(count($allAssignedRegions))
        {
            foreach($allRegions as $key => $region)
            {
                if(array_key_exists($region['value'],$allAssignedRegions))
                {
                    unset($allRegions[$key]);
                }
            }
        }

        $regionArray = $allRegions;

        return $regionArray;
    }


    public function GetAllAssignedRegions($originId)
    {
        $regionArray = array();

        $originToRegionCollection = Mage::getResourceModel('dos/states_collection')->addFieldToFilter('originId', $originId)->load()->getItems();
        $allRegions = $this->GetRegions(FALSE);

        foreach($allRegions as $region)
        {
            if(array_key_exists($region['value'],$originToRegionCollection))
            {
                array_push($regionArray, array(
                    'value'     => $region['value'],
                    'label'     => $region['label']
                ));
            }

        }

        return $regionArray;
    }


    public function GetOriginAddress($regionCode = null)
    {
        $origin = null;

        if($regionCode !== null)
        {
            $origin = Mage::getModel('dos/origin')->load((int)Mage::getModel('dos/states')->load($regionCode)->getData('originId'));
        }

        return $origin;
    }


    public function ModifyOriginAddress($regionCode)
    {
        $address = $this->GetOriginAddress($regionCode);

        if($address !== null)
        {
            $region = Mage::getModel('directory/region')->getCollection()->addFieldToFilter('code', $address->getState())->load()->getItems();

            if (count($region))
            {
                $region = reset($region);

                $store = Mage::app()->getStore();
                $configScope = array(
                    'street_line1' => $address->getAddress(),
                    'street_line2' => "",
                    'city' => $address->getCity(),
                    'region_id' => $address->getState(),
                    'postcode' => $address->getZipcode(),
                    'country_id' => $region->getCountryId()
                );

                foreach ($configScope as $_scope => $_val)
                {
                    $store->setConfig('shipping/origin/' . $_scope, $_val);
                }
                $store->save();
            }
        }
    }

}