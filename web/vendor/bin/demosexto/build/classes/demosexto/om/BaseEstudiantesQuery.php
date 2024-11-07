<?php


/**
 * Base class that represents a query for the 'estudiantes' table.
 *
 *
 *
 * @method EstudiantesQuery orderByIdEstudiantes($order = Criteria::ASC) Order by the id column
 * @method EstudiantesQuery orderByMatricula($order = Criteria::ASC) Order by the matricula column
 * @method EstudiantesQuery orderByCarrera($order = Criteria::ASC) Order by the carrera column
 * @method EstudiantesQuery orderByNombres($order = Criteria::ASC) Order by the nombres column
 * @method EstudiantesQuery orderByApellidos($order = Criteria::ASC) Order by the apellidos column
 *
 * @method EstudiantesQuery groupByIdEstudiantes() Group by the id column
 * @method EstudiantesQuery groupByMatricula() Group by the matricula column
 * @method EstudiantesQuery groupByCarrera() Group by the carrera column
 * @method EstudiantesQuery groupByNombres() Group by the nombres column
 * @method EstudiantesQuery groupByApellidos() Group by the apellidos column
 *
 * @method EstudiantesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EstudiantesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EstudiantesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Estudiantes findOne(PropelPDO $con = null) Return the first Estudiantes matching the query
 * @method Estudiantes findOneOrCreate(PropelPDO $con = null) Return the first Estudiantes matching the query, or a new Estudiantes object populated from the query conditions when no match is found
 *
 * @method Estudiantes findOneByMatricula(string $matricula) Return the first Estudiantes filtered by the matricula column
 * @method Estudiantes findOneByCarrera(int $carrera) Return the first Estudiantes filtered by the carrera column
 * @method Estudiantes findOneByNombres(string $nombres) Return the first Estudiantes filtered by the nombres column
 * @method Estudiantes findOneByApellidos(string $apellidos) Return the first Estudiantes filtered by the apellidos column
 *
 * @method array findByIdEstudiantes(int $id) Return Estudiantes objects filtered by the id column
 * @method array findByMatricula(string $matricula) Return Estudiantes objects filtered by the matricula column
 * @method array findByCarrera(int $carrera) Return Estudiantes objects filtered by the carrera column
 * @method array findByNombres(string $nombres) Return Estudiantes objects filtered by the nombres column
 * @method array findByApellidos(string $apellidos) Return Estudiantes objects filtered by the apellidos column
 *
 * @package    propel.generator.demosexto.om
 */
abstract class BaseEstudiantesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEstudiantesQuery object.
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
            $modelName = 'Estudiantes';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EstudiantesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EstudiantesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EstudiantesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EstudiantesQuery) {
            return $criteria;
        }
        $query = new EstudiantesQuery(null, null, $modelAlias);

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
     * @return   Estudiantes|Estudiantes[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EstudiantesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EstudiantesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Estudiantes A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdEstudiantes($key, $con = null)
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
     * @return                 Estudiantes A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `matricula`, `carrera`, `nombres`, `apellidos` FROM `estudiantes` WHERE `id` = :p0';
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
            $obj = new Estudiantes();
            $obj->hydrate($row);
            EstudiantesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Estudiantes|Estudiantes[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Estudiantes[]|mixed the list of results, formatted by the current formatter
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
     * @return EstudiantesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EstudiantesPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EstudiantesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EstudiantesPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEstudiantes(1234); // WHERE id = 1234
     * $query->filterByIdEstudiantes(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByIdEstudiantes(array('min' => 12)); // WHERE id >= 12
     * $query->filterByIdEstudiantes(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $idEstudiantes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EstudiantesQuery The current query, for fluid interface
     */
    public function filterByIdEstudiantes($idEstudiantes = null, $comparison = null)
    {
        if (is_array($idEstudiantes)) {
            $useMinMax = false;
            if (isset($idEstudiantes['min'])) {
                $this->addUsingAlias(EstudiantesPeer::ID, $idEstudiantes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEstudiantes['max'])) {
                $this->addUsingAlias(EstudiantesPeer::ID, $idEstudiantes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstudiantesPeer::ID, $idEstudiantes, $comparison);
    }

    /**
     * Filter the query on the matricula column
     *
     * Example usage:
     * <code>
     * $query->filterByMatricula('fooValue');   // WHERE matricula = 'fooValue'
     * $query->filterByMatricula('%fooValue%'); // WHERE matricula LIKE '%fooValue%'
     * </code>
     *
     * @param     string $matricula The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EstudiantesQuery The current query, for fluid interface
     */
    public function filterByMatricula($matricula = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($matricula)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $matricula)) {
                $matricula = str_replace('*', '%', $matricula);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EstudiantesPeer::MATRICULA, $matricula, $comparison);
    }

    /**
     * Filter the query on the carrera column
     *
     * @param     mixed $carrera The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EstudiantesQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByCarrera($carrera = null, $comparison = null)
    {
        if (is_scalar($carrera)) {
            $carrera = EstudiantesPeer::getSqlValueForEnum(EstudiantesPeer::CARRERA, $carrera);
        } elseif (is_array($carrera)) {
            $convertedValues = array();
            foreach ($carrera as $value) {
                $convertedValues[] = EstudiantesPeer::getSqlValueForEnum(EstudiantesPeer::CARRERA, $value);
            }
            $carrera = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstudiantesPeer::CARRERA, $carrera, $comparison);
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
     * @return EstudiantesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EstudiantesPeer::NOMBRES, $nombres, $comparison);
    }

    /**
     * Filter the query on the apellidos column
     *
     * Example usage:
     * <code>
     * $query->filterByApellidos('fooValue');   // WHERE apellidos = 'fooValue'
     * $query->filterByApellidos('%fooValue%'); // WHERE apellidos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apellidos The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EstudiantesQuery The current query, for fluid interface
     */
    public function filterByApellidos($apellidos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apellidos)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $apellidos)) {
                $apellidos = str_replace('*', '%', $apellidos);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EstudiantesPeer::APELLIDOS, $apellidos, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Estudiantes $estudiantes Object to remove from the list of results
     *
     * @return EstudiantesQuery The current query, for fluid interface
     */
    public function prune($estudiantes = null)
    {
        if ($estudiantes) {
            $this->addUsingAlias(EstudiantesPeer::ID, $estudiantes->getIdEstudiantes(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
