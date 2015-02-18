<?php
require_once('app/Mage.php'); //Path to Magento
umask(0);
Mage::app();

$entityTypeId = 'catalog_product';

$setup = Mage::getResourceModel('catalog/setup','catalog_setup');

$setup->removeAttribute($entityTypeId,'dim_weight');
$setup->removeAttribute($entityTypeId,'dim_height');
$setup->removeAttribute($entityTypeId,'dim_length');
$setup->removeAttribute($entityTypeId,'dim_width');

//$setup->addAttribute($entityTypeId, 'dim_weight', array(
//    'group' => 'General',
//    'input' => 'text',
//    'type' => 'text',
//    'label' => 'Dim Weight',
//    'frontend_class' => 'validate-number',
//    'backend' => '',
//    'visible' => 1,
//    'required' => 0,
//    'user_defined' => 1,
//    'searchable' => 0,
//    'filterable' => 0,
//    'sort_order' => 30,
//    'comparable' => 0,
//    'visible_on_front' => 0,
//    'visible_in_advanced_search' => 0,
//    'is_html_allowed_on_front' => 0,
//    'is_configurable' => 0,
//    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL
//));
//
//$setup->addAttribute($entityTypeId, 'dim_height', array(
//    'group' => 'General',
//    'input' => 'text',
//    'type' => 'text',
//    'label' => 'Dim Height',
//    'frontend_class' => 'validate-number',
//    'backend' => '',
//    'visible' => 1,
//    'required' => 0,
//    'user_defined' => 1,
//    'searchable' => 0,
//    'filterable' => 0,
//    'sort_order' => 30,
//    'comparable' => 0,
//    'visible_on_front' => 0,
//    'visible_in_advanced_search' => 0,
//    'is_html_allowed_on_front' => 0,
//    'is_configurable' => 0,
//    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL
//));
//
//$setup->addAttribute($entityTypeId, 'dim_length', array(
//    'group' => 'General',
//    'input' => 'text',
//    'type' => 'text',
//    'label' => 'Dim Length',
//    'frontend_class' => 'validate-number',
//    'backend' => '',
//    'visible' => 1,
//    'required' => 0,
//    'user_defined' => 1,
//    'searchable' => 0,
//    'filterable' => 0,
//    'sort_order' => 30,
//    'comparable' => 0,
//    'visible_on_front' => 0,
//    'visible_in_advanced_search' => 0,
//    'is_html_allowed_on_front' => 0,
//    'is_configurable' => 0,
//    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL
//));
//
//$setup->addAttribute($entityTypeId, 'dim_width', array(
//    'group' => 'General',
//    'input' => 'text',
//    'type' => 'text',
//    'label' => 'Dim Width',
//    'frontend_class' => 'validate-number',
//    'backend' => '',
//    'visible' => 1,
//    'required' => 0,
//    'user_defined' => 1,
//    'searchable' => 0,
//    'filterable' => 0,
//    'sort_order' => 30,
//    'comparable' => 0,
//    'visible_on_front' => 0,
//    'visible_in_advanced_search' => 0,
//    'is_html_allowed_on_front' => 0,
//    'is_configurable' => 0,
//    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL
//));
//
//
//$attributeSetCollection = Mage::getResourceModel('eav/entity_attribute_set_collection')
//    ->setEntityTypeFilter(4)
//    ->load();
//
//foreach($attributeSetCollection->getItems() as $set)
//{
//    $setup->addAttributeToSet($entityTypeId,$set->getAttributeSetId(),'General',Mage::getModel('eav/entity_attribute')->loadByCode($entityTypeId, 'dim_weight')->getAttributeId(),5);
//    $setup->addAttributeToSet($entityTypeId,$set->getAttributeSetId(),'General',Mage::getModel('eav/entity_attribute')->loadByCode($entityTypeId, 'dim_height')->getAttributeId(),5);
//    $setup->addAttributeToSet($entityTypeId,$set->getAttributeSetId(),'General',Mage::getModel('eav/entity_attribute')->loadByCode($entityTypeId, 'dim_length')->getAttributeId(),5);
//    $setup->addAttributeToSet($entityTypeId,$set->getAttributeSetId(),'General',Mage::getModel('eav/entity_attribute')->loadByCode($entityTypeId, 'dim_width')->getAttributeId(),5);
//}
//
