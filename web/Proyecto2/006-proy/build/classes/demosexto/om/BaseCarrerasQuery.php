<?php


/**
 * Base class that represents a query for the 'carreras' table.
 *
 *
 *
 * @method CarrerasQuery orderByIdCarreras($order = Criteria::ASC) Order by the id column
 * @method CarrerasQuery orderByCarreras($order = Criteria::ASC) Order by the carreras column
 * @method CarrerasQuery orderBySemestres($order = Criteria::ASC) Order by the semestres column
 * @method CarrerasQuery orderByClaveCarreras($order = Criteria::ASC) Order by the clave column
 *
 * @method CarrerasQuery groupByIdCarreras() Group by the id column
 * @method CarrerasQuery groupByCarreras() Group by the carreras column
 * @method CarrerasQuery groupBySemestres() Group by the semestres column
 * @method CarrerasQuery groupByClaveCarreras() Group by the clave column
 *
 * @method CarrerasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CarrerasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CarrerasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Carreras findOne(PropelPDO $con = null) Return the first Carreras matching the query
 * @method Carreras findOneOrCreate(PropelPDO $con = null) Return the first Carreras matching the query, or a new Carreras object populated from the query conditions when no match is found
 *
 * @method Carreras findOneByCarreras(int $carreras) Return the first Carreras filtered by the carreras column
 * @method Carreras findOneBySemestres(string $semestres) Return the first Carreras filtered by the semestres column
 * @method Carreras findOneByClaveCarreras(string $clave) Return the first Carreras filtered by the clave column
 *
 * @method array findByIdCarreras(int $id) Return Carreras objects filtered by the id column
 * @method array findByCarreras(int $carreras) Return Carreras objects filtered by the carreras column
 * @method array findBySemestres(string $semestres) Return Carreras objects filtered by the semestres column
 * @method array findByClaveCarreras(string $clave) Return Carreras objects filtered by the clave column
 *
 * @package    propel.generator.demosexto.om
 */
abstract class BaseCarrerasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCarrerasQuery object.
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
            $modelName = 'Carreras';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CarrerasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CarrerasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CarrerasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CarrerasQuery) {
            return $criteria;
        }
        $query = new CarrerasQuery(null, null, $modelAlias);

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
     * @return   Carreras|Carreras[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CarrerasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CarrerasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Carreras A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCarreras($key, $con = null)
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
     * @return                 Carreras A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `carreras`, `semestres`, `clave` FROM `carreras` WHERE `id` = :p0';
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
            $obj = new Carreras();
            $obj->hydrate($row);
            CarrerasPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Carreras|Carreras[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Carreras[]|mixed the list of results, formatted by the current formatter
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
     * @return CarrerasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CarrerasPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CarrerasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CarrerasPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCarreras(1234); // WHERE id = 1234
     * $query->filterByIdCarreras(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByIdCarreras(array('min' => 12)); // WHERE id >= 12
     * $query->filterByIdCarreras(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $idCarreras The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarrerasQuery The current query, for fluid interface
     */
    public function filterByIdCarreras($idCarreras = null, $comparison = null)
    {
        if (is_array($idCarreras)) {
            $useMinMax = false;
            if (isset($idCarreras['min'])) {
                $this->addUsingAlias(CarrerasPeer::ID, $idCarreras['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCarreras['max'])) {
                $this->addUsingAlias(CarrerasPeer::ID, $idCarreras['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarrerasPeer::ID, $idCarreras, $comparison);
    }

    /**
     * Filter the query on the carreras column
     *
     * @param     mixed $carreras The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarrerasQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByCarreras($carreras = null, $comparison = null)
    {
        if (is_scalar($carreras)) {
            $carreras = CarrerasPeer::getSqlValueForEnum(CarrerasPeer::CARRERAS, $carreras);
        } elseif (is_array($carreras)) {
            $convertedValues = array();
            foreach ($carreras as $value) {
                $convertedValues[] = CarrerasPeer::getSqlValueForEnum(CarrerasPeer::CARRERAS, $value);
            }
            $carreras = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarrerasPeer::CARRERAS, $carreras, $comparison);
    }

    /**
     * Filter the query on the semestres column
     *
     * Example usage:
     * <code>
     * $query->filterBySemestres('fooValue');   // WHERE semestres = 'fooValue'
     * $query->filterBySemestres('%fooValue%'); // WHERE semestres LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semestres The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarrerasQuery The current query, for fluid interface
     */
    public function filterBySemestres($semestres = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semestres)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semestres)) {
                $semestres = str_replace('*', '%', $semestres);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CarrerasPeer::SEMESTRES, $semestres, $comparison);
    }

    /**
     * Filter the query on the clave column
     *
     * Example usage:
     * <code>
     * $query->filterByClaveCarreras('fooValue');   // WHERE clave = 'fooValue'
     * $query->filterByClaveCarreras('%fooValue%'); // WHERE clave LIKE '%fooValue%'
     * </code>
     *
     * @param     string $claveCarreras The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarrerasQuery The current query, for fluid interface
     */
    public function filterByClaveCarreras($claveCarreras = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($claveCarreras)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $claveCarreras)) {
                $claveCarreras = str_replace('*', '%', $claveCarreras);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CarrerasPeer::CLAVE, $claveCarreras, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Carreras $carreras Object to remove from the list of results
     *
     * @return CarrerasQuery The current query, for fluid interface
     */
    public function prune($carreras = null)
    {
        if ($carreras) {
            $this->addUsingAlias(CarrerasPeer::ID, $carreras->getIdCarreras(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
