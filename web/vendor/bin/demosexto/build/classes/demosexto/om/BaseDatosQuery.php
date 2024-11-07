<?php


/**
 * Base class that represents a query for the 'datos' table.
 *
 *
 *
 * @method DatosQuery orderByIdDatos($order = Criteria::ASC) Order by the id column
 * @method DatosQuery orderByCorreo($order = Criteria::ASC) Order by the correo column
 * @method DatosQuery orderByContrasena($order = Criteria::ASC) Order by the contrasena column
 * @method DatosQuery orderByNombres($order = Criteria::ASC) Order by the nombres column
 *
 * @method DatosQuery groupByIdDatos() Group by the id column
 * @method DatosQuery groupByCorreo() Group by the correo column
 * @method DatosQuery groupByContrasena() Group by the contrasena column
 * @method DatosQuery groupByNombres() Group by the nombres column
 *
 * @method DatosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DatosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DatosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Datos findOne(PropelPDO $con = null) Return the first Datos matching the query
 * @method Datos findOneOrCreate(PropelPDO $con = null) Return the first Datos matching the query, or a new Datos object populated from the query conditions when no match is found
 *
 * @method Datos findOneByCorreo(string $correo) Return the first Datos filtered by the correo column
 * @method Datos findOneByContrasena(string $contrasena) Return the first Datos filtered by the contrasena column
 * @method Datos findOneByNombres(string $nombres) Return the first Datos filtered by the nombres column
 *
 * @method array findByIdDatos(int $id) Return Datos objects filtered by the id column
 * @method array findByCorreo(string $correo) Return Datos objects filtered by the correo column
 * @method array findByContrasena(string $contrasena) Return Datos objects filtered by the contrasena column
 * @method array findByNombres(string $nombres) Return Datos objects filtered by the nombres column
 *
 * @package    propel.generator.demosexto.om
 */
abstract class BaseDatosQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDatosQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'demosexto';
        }
        if (null === $modelName) {
            $modelName = 'Datos';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DatosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DatosQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DatosQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DatosQuery) {
            return $criteria;
        }
        $query = new DatosQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Datos|Datos[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DatosPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DatosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Datos A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdDatos($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Datos A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `correo`, `contrasena`, `nombres` FROM `datos` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Datos();
            $obj->hydrate($row);
            DatosPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Datos|Datos[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Datos[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return DatosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DatosPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DatosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DatosPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDatos(1234); // WHERE id = 1234
     * $query->filterByIdDatos(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByIdDatos(array('min' => 12)); // WHERE id >= 12
     * $query->filterByIdDatos(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $idDatos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DatosQuery The current query, for fluid interface
     */
    public function filterByIdDatos($idDatos = null, $comparison = null)
    {
        if (is_array($idDatos)) {
            $useMinMax = false;
            if (isset($idDatos['min'])) {
                $this->addUsingAlias(DatosPeer::ID, $idDatos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDatos['max'])) {
                $this->addUsingAlias(DatosPeer::ID, $idDatos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatosPeer::ID, $idDatos, $comparison);
    }

    /**
     * Filter the query on the correo column
     *
     * Example usage:
     * <code>
     * $query->filterByCorreo('fooValue');   // WHERE correo = 'fooValue'
     * $query->filterByCorreo('%fooValue%'); // WHERE correo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $correo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DatosQuery The current query, for fluid interface
     */
    public function filterByCorreo($correo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($correo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $correo)) {
                $correo = str_replace('*', '%', $correo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DatosPeer::CORREO, $correo, $comparison);
    }

    /**
     * Filter the query on the contrasena column
     *
     * Example usage:
     * <code>
     * $query->filterByContrasena('fooValue');   // WHERE contrasena = 'fooValue'
     * $query->filterByContrasena('%fooValue%'); // WHERE contrasena LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contrasena The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DatosQuery The current query, for fluid interface
     */
    public function filterByContrasena($contrasena = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contrasena)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contrasena)) {
                $contrasena = str_replace('*', '%', $contrasena);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DatosPeer::CONTRASENA, $contrasena, $comparison);
    }

    /**
     * Filter the query on the nombres column
     *
     * Example usage:
     * <code>
     * $query->filterByNombres('fooValue');   // WHERE nombres = 'fooValue'
     * $query->filterByNombres('%fooValue%'); // WHERE nombres LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombres The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DatosQuery The current query, for fluid interface
     */
    public function filterByNombres($nombres = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombres)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombres)) {
                $nombres = str_replace('*', '%', $nombres);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DatosPeer::NOMBRES, $nombres, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Datos $datos Object to remove from the list of results
     *
     * @return DatosQuery The current query, for fluid interface
     */
    public function prune($datos = null)
    {
        if ($datos) {
            $this->addUsingAlias(DatosPeer::ID, $datos->getIdDatos(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
