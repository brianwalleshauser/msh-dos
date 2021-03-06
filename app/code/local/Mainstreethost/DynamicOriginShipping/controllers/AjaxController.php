<?php
/**
 * Created by PhpStorm.
 * User: bwalleshauser
 * Date: 2/17/2015
 * Time: 10:13 AM
 */

class Mainstreethost_DynamicOriginShipping_AjaxController extends Mage_Core_Controller_Front_Action
{
    public function updateAction()
    {
        $test = "test";
        $postData = $this->getRequest()->getPost();

        if(count($postData))
        {
            foreach($postData['regions'] as $region)
            {
                $state = Mage::getModel('dos/states')->load($region);
                if($postData['type'] == "add")
                {
                    $state->setData('originId',$postData['originId']);
                }
                else
                {
                    $state->setData('originId',0);
                }
                $state->save();
            }
        }
    }
}