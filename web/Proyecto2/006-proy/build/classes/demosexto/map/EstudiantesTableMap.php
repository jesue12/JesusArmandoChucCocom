<?php



/**
 * This class defines the structure of the 'estudiantes' table.
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
class EstudiantesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'demosexto.map.EstudiantesTableMap';

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
        $this->setName('estudiantes');
        $this->setPhpName('Estudiantes');
        $this->setClassname('Estudiantes');
        $this->setPackage('demosexto');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'IdEstudiantes', 'INTEGER', true, null, null);
        $this->addColumn('matricula', 'Matricula', 'VARCHAR', true, 10, null);
        $this->addColumn('carrera', 'Carrera', 'ENUM', true, null, null);
        $this->getColumn('carrera', false)->setValueSet(array (
  0 => 'bio',
  1 => 'adm',
  2 => 'inf',
  3 => 'ige',
  4 => 'agr',
));
        $this->addColumn('nombres', 'Nombres', 'VARCHAR', true, 200, null);
        $this->addColumn('apellidos', 'Apellidos', 'VARCHAR', true, 200, null);
        // validators
        $this->addValidator('nombres', 'required', 'propel.validator.RequiredValidator', '', 'Debes de poner tu nombre');
        $this->addValidator('apellidos', 'required', 'propel.validator.RequiredValidator', '', 'Debes de poner tu apellido');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // EstudiantesTableMap
