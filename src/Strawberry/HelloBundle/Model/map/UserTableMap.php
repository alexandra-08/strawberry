<?php

namespace Strawberry\HelloBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src.Strawberry.HelloBundle.Model.map
 */
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Strawberry.HelloBundle.Model.map.UserTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('Strawberry\\HelloBundle\\Model\\User');
        $this->setPackage('src.Strawberry.HelloBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 100, null);
        $this->getColumn('name', false)->setPrimaryString(true);
        $this->addColumn('gender', 'Gender', 'VARCHAR', false, 10, null);
        $this->addColumn('city', 'City', 'VARCHAR', false, 50, null);
        $this->addColumn('active', 'Active', 'BOOLEAN', false, 1, null);
        $this->addForeignKey('team_id', 'TeamId', 'INTEGER', 'team', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Team', 'Strawberry\\HelloBundle\\Model\\Team', RelationMap::MANY_TO_ONE, array('team_id' => 'id', ), null, null);
    } // buildRelations()

} // UserTableMap
