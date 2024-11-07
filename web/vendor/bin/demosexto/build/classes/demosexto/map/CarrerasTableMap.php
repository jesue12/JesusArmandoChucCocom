<?php



/**
 * This class defines the structure of the 'carreras' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.demosexto.map
 */
class CarrerasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'demosexto.map.CarrerasTableMap';

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
        $this->setName('carreras');
        $this->setPhpName('Carreras');
        $this->setClassname('Carreras');
        $this->setPackage('demosexto');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'IdCarreras', 'INTEGER', true, null, null);
        $this->addColumn('carreras', 'Carreras', 'ENUM', true, null, null);
        $this->getColumn('carreras', false)->setValueSet(array (
  0 => 'bio',
  1 => 'adm',
  2 => 'inf',
  3 => 'ige',
  4 => 'agr',
));
        $this->addColumn('semestres', 'Semestres', 'VARCHAR', true, 50, null);
        $this->addColumn('clave', 'ClaveCarreras', 'VARCHAR', true, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // CarrerasTableMap
