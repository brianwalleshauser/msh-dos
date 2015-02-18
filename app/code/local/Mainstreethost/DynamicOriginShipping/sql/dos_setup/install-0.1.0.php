<?php
/**
 * Created by PhpStorm.
 * User: bwalleshauser
 * Date: 2/11/2015
 * Time: 2:12 PM
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */

$this->startSetup();

/**
 * Note: there are many ways in Magento to achieve the same result of
 * creating a database table. For this tutorial, we have gone with the
 * Varien_Db_Ddl_Table method, but feel free to explore what Magento
 * does in CE 1.8.0.0 and earlier versions.
 */
$table = new Varien_Db_Ddl_Table();

/**
 * This is an alias of the real name of our database table, which is
 * configured in config.xml. By using an alias, we can refer to the same
 * table throughout our code if we wish, and if the table name ever has
 * to change, we can simply update a single location, config.xml
 * - dos_origin is the model alias
 * - origin is the table reference
 */
$table->setName($this->getTable('dos/origin'));

/**
 * Add the columns we need for now. If you need more later, you can
 * always create a new setup script as an upgrade. We will introduce
 * that later in this tutorial.
 */
$table->addColumn(
    'entity_id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    10,
    array(
        'auto_increment' => true,
        'unsigned' => true,
        'nullable'=> false,
        'primary' => true
    )
);
$table->addColumn(
    'created_at',
    Varien_Db_Ddl_Table::TYPE_DATETIME,
    null,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'updated_at',
    Varien_Db_Ddl_Table::TYPE_DATETIME,
    null,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'name',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'address',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'city',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'state',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'zipcode',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'country',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'usps_userid',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'usps_password',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'ups_license',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'ups_userid',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'ups_password',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'fedex_meternumber',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'fedex_key',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'fedex_userid',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'fedex_password',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);


/**
 * These two important lines are often missed.
 */
$table->setOption('type', 'InnoDB');
$table->setOption('charset', 'utf8');

/**
 * Create the table!
 */
$this->getConnection()->createTable($table);




$states = new Varien_Db_Ddl_Table();
$states->setName($this->getTable('dos/states'));
$states->addColumn(
    'state',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable'=> false,
        'primary' => true
    )
);

$states->addColumn(
    'originId',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    10,
    array(
        'nullable'=> false
    )
);

$states->setOption('type', 'InnoDB');
$states->setOption('charset', 'utf8');
$this->getConnection()->createTable($states);

$insert = "";

foreach(Mage::helper('dos')->GetRegions(FALSE) as $region)
{
    $insert .= "INSERT INTO " . $this->getTable('dos/states') . " VALUES ('" . $region['value'] . "',0);";



}
$this->run($insert);



$this->endSetup();