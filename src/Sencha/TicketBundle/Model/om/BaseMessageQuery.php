<?php

namespace Sencha\TicketBundle\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Sencha\TicketBundle\Model\Message;
use Sencha\TicketBundle\Model\MessagePeer;
use Sencha\TicketBundle\Model\MessageQuery;

/**
 * @method MessageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MessageQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method MessageQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method MessageQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method MessageQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method MessageQuery orderByHeaderMail($order = Criteria::ASC) Order by the header_mail column
 * @method MessageQuery orderByBody($order = Criteria::ASC) Order by the body column
 * @method MessageQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method MessageQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method MessageQuery orderByPriority($order = Criteria::ASC) Order by the priority column
 * @method MessageQuery orderBySource($order = Criteria::ASC) Order by the source column
 * @method MessageQuery orderByOverdueDate($order = Criteria::ASC) Order by the overdue_date column
 * @method MessageQuery orderByLastResponseDate($order = Criteria::ASC) Order by the last_response_date column
 * @method MessageQuery orderByCreationDate($order = Criteria::ASC) Order by the creation_date column
 * @method MessageQuery orderByModificationDate($order = Criteria::ASC) Order by the modification_date column
 *
 * @method MessageQuery groupById() Group by the id column
 * @method MessageQuery groupByUsername() Group by the username column
 * @method MessageQuery groupBySubject() Group by the subject column
 * @method MessageQuery groupByEmail() Group by the email column
 * @method MessageQuery groupByPhone() Group by the phone column
 * @method MessageQuery groupByHeaderMail() Group by the header_mail column
 * @method MessageQuery groupByBody() Group by the body column
 * @method MessageQuery groupByIpAddress() Group by the ip_address column
 * @method MessageQuery groupByStatus() Group by the status column
 * @method MessageQuery groupByPriority() Group by the priority column
 * @method MessageQuery groupBySource() Group by the source column
 * @method MessageQuery groupByOverdueDate() Group by the overdue_date column
 * @method MessageQuery groupByLastResponseDate() Group by the last_response_date column
 * @method MessageQuery groupByCreationDate() Group by the creation_date column
 * @method MessageQuery groupByModificationDate() Group by the modification_date column
 *
 * @method MessageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MessageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MessageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Message findOne(PropelPDO $con = null) Return the first Message matching the query
 * @method Message findOneOrCreate(PropelPDO $con = null) Return the first Message matching the query, or a new Message object populated from the query conditions when no match is found
 *
 * @method Message findOneByUsername(string $username) Return the first Message filtered by the username column
 * @method Message findOneBySubject(string $subject) Return the first Message filtered by the subject column
 * @method Message findOneByEmail(string $email) Return the first Message filtered by the email column
 * @method Message findOneByPhone(string $phone) Return the first Message filtered by the phone column
 * @method Message findOneByHeaderMail(string $header_mail) Return the first Message filtered by the header_mail column
 * @method Message findOneByBody(string $body) Return the first Message filtered by the body column
 * @method Message findOneByIpAddress(string $ip_address) Return the first Message filtered by the ip_address column
 * @method Message findOneByStatus(string $status) Return the first Message filtered by the status column
 * @method Message findOneByPriority(string $priority) Return the first Message filtered by the priority column
 * @method Message findOneBySource(string $source) Return the first Message filtered by the source column
 * @method Message findOneByOverdueDate(string $overdue_date) Return the first Message filtered by the overdue_date column
 * @method Message findOneByLastResponseDate(string $last_response_date) Return the first Message filtered by the last_response_date column
 * @method Message findOneByCreationDate(string $creation_date) Return the first Message filtered by the creation_date column
 * @method Message findOneByModificationDate(string $modification_date) Return the first Message filtered by the modification_date column
 *
 * @method array findById(int $id) Return Message objects filtered by the id column
 * @method array findByUsername(string $username) Return Message objects filtered by the username column
 * @method array findBySubject(string $subject) Return Message objects filtered by the subject column
 * @method array findByEmail(string $email) Return Message objects filtered by the email column
 * @method array findByPhone(string $phone) Return Message objects filtered by the phone column
 * @method array findByHeaderMail(string $header_mail) Return Message objects filtered by the header_mail column
 * @method array findByBody(string $body) Return Message objects filtered by the body column
 * @method array findByIpAddress(string $ip_address) Return Message objects filtered by the ip_address column
 * @method array findByStatus(string $status) Return Message objects filtered by the status column
 * @method array findByPriority(string $priority) Return Message objects filtered by the priority column
 * @method array findBySource(string $source) Return Message objects filtered by the source column
 * @method array findByOverdueDate(string $overdue_date) Return Message objects filtered by the overdue_date column
 * @method array findByLastResponseDate(string $last_response_date) Return Message objects filtered by the last_response_date column
 * @method array findByCreationDate(string $creation_date) Return Message objects filtered by the creation_date column
 * @method array findByModificationDate(string $modification_date) Return Message objects filtered by the modification_date column
 */
abstract class BaseMessageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMessageQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'default';
        }
        if (null === $modelName) {
            $modelName = 'Sencha\\TicketBundle\\Model\\Message';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MessageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MessageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MessageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MessageQuery) {
            return $criteria;
        }
        $query = new MessageQuery(null, null, $modelAlias);

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
     * @return   Message|Message[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MessagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MessagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Message A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
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
     * @return                 Message A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `username`, `subject`, `email`, `phone`, `header_mail`, `body`, `ip_address`, `status`, `priority`, `source`, `overdue_date`, `last_response_date`, `creation_date`, `modification_date` FROM `message` WHERE `id` = :p0';
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
            $obj = new Message();
            $obj->hydrate($row);
            MessagePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Message|Message[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Message[]|mixed the list of results, formatted by the current formatter
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
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MessagePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MessagePeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MessagePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MessagePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MessagePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the subject column
     *
     * Example usage:
     * <code>
     * $query->filterBySubject('fooValue');   // WHERE subject = 'fooValue'
     * $query->filterBySubject('%fooValue%'); // WHERE subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterBySubject($subject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $subject)) {
                $subject = str_replace('*', '%', $subject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::SUBJECT, $subject, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the header_mail column
     *
     * Example usage:
     * <code>
     * $query->filterByHeaderMail('fooValue');   // WHERE header_mail = 'fooValue'
     * $query->filterByHeaderMail('%fooValue%'); // WHERE header_mail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $headerMail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByHeaderMail($headerMail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($headerMail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $headerMail)) {
                $headerMail = str_replace('*', '%', $headerMail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::HEADER_MAIL, $headerMail, $comparison);
    }

    /**
     * Filter the query on the body column
     *
     * Example usage:
     * <code>
     * $query->filterByBody('fooValue');   // WHERE body = 'fooValue'
     * $query->filterByBody('%fooValue%'); // WHERE body LIKE '%fooValue%'
     * </code>
     *
     * @param     string $body The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByBody($body = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($body)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $body)) {
                $body = str_replace('*', '%', $body);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::BODY, $body, $comparison);
    }

    /**
     * Filter the query on the ip_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
     * $query->filterByIpAddress('%fooValue%'); // WHERE ip_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByIpAddress($ipAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ipAddress)) {
                $ipAddress = str_replace('*', '%', $ipAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::IP_ADDRESS, $ipAddress, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the priority column
     *
     * Example usage:
     * <code>
     * $query->filterByPriority('fooValue');   // WHERE priority = 'fooValue'
     * $query->filterByPriority('%fooValue%'); // WHERE priority LIKE '%fooValue%'
     * </code>
     *
     * @param     string $priority The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByPriority($priority = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($priority)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $priority)) {
                $priority = str_replace('*', '%', $priority);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::PRIORITY, $priority, $comparison);
    }

    /**
     * Filter the query on the source column
     *
     * Example usage:
     * <code>
     * $query->filterBySource('fooValue');   // WHERE source = 'fooValue'
     * $query->filterBySource('%fooValue%'); // WHERE source LIKE '%fooValue%'
     * </code>
     *
     * @param     string $source The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterBySource($source = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($source)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $source)) {
                $source = str_replace('*', '%', $source);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MessagePeer::SOURCE, $source, $comparison);
    }

    /**
     * Filter the query on the overdue_date column
     *
     * Example usage:
     * <code>
     * $query->filterByOverdueDate('2011-03-14'); // WHERE overdue_date = '2011-03-14'
     * $query->filterByOverdueDate('now'); // WHERE overdue_date = '2011-03-14'
     * $query->filterByOverdueDate(array('max' => 'yesterday')); // WHERE overdue_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $overdueDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByOverdueDate($overdueDate = null, $comparison = null)
    {
        if (is_array($overdueDate)) {
            $useMinMax = false;
            if (isset($overdueDate['min'])) {
                $this->addUsingAlias(MessagePeer::OVERDUE_DATE, $overdueDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($overdueDate['max'])) {
                $this->addUsingAlias(MessagePeer::OVERDUE_DATE, $overdueDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MessagePeer::OVERDUE_DATE, $overdueDate, $comparison);
    }

    /**
     * Filter the query on the last_response_date column
     *
     * Example usage:
     * <code>
     * $query->filterByLastResponseDate('2011-03-14'); // WHERE last_response_date = '2011-03-14'
     * $query->filterByLastResponseDate('now'); // WHERE last_response_date = '2011-03-14'
     * $query->filterByLastResponseDate(array('max' => 'yesterday')); // WHERE last_response_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $lastResponseDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByLastResponseDate($lastResponseDate = null, $comparison = null)
    {
        if (is_array($lastResponseDate)) {
            $useMinMax = false;
            if (isset($lastResponseDate['min'])) {
                $this->addUsingAlias(MessagePeer::LAST_RESPONSE_DATE, $lastResponseDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastResponseDate['max'])) {
                $this->addUsingAlias(MessagePeer::LAST_RESPONSE_DATE, $lastResponseDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MessagePeer::LAST_RESPONSE_DATE, $lastResponseDate, $comparison);
    }

    /**
     * Filter the query on the creation_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreationDate('2011-03-14'); // WHERE creation_date = '2011-03-14'
     * $query->filterByCreationDate('now'); // WHERE creation_date = '2011-03-14'
     * $query->filterByCreationDate(array('max' => 'yesterday')); // WHERE creation_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $creationDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByCreationDate($creationDate = null, $comparison = null)
    {
        if (is_array($creationDate)) {
            $useMinMax = false;
            if (isset($creationDate['min'])) {
                $this->addUsingAlias(MessagePeer::CREATION_DATE, $creationDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creationDate['max'])) {
                $this->addUsingAlias(MessagePeer::CREATION_DATE, $creationDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MessagePeer::CREATION_DATE, $creationDate, $comparison);
    }

    /**
     * Filter the query on the modification_date column
     *
     * Example usage:
     * <code>
     * $query->filterByModificationDate('2011-03-14'); // WHERE modification_date = '2011-03-14'
     * $query->filterByModificationDate('now'); // WHERE modification_date = '2011-03-14'
     * $query->filterByModificationDate(array('max' => 'yesterday')); // WHERE modification_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $modificationDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function filterByModificationDate($modificationDate = null, $comparison = null)
    {
        if (is_array($modificationDate)) {
            $useMinMax = false;
            if (isset($modificationDate['min'])) {
                $this->addUsingAlias(MessagePeer::MODIFICATION_DATE, $modificationDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modificationDate['max'])) {
                $this->addUsingAlias(MessagePeer::MODIFICATION_DATE, $modificationDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MessagePeer::MODIFICATION_DATE, $modificationDate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Message $message Object to remove from the list of results
     *
     * @return MessageQuery The current query, for fluid interface
     */
    public function prune($message = null)
    {
        if ($message) {
            $this->addUsingAlias(MessagePeer::ID, $message->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     MessageQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(MessagePeer::MODIFICATION_DATE, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     MessageQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(MessagePeer::MODIFICATION_DATE);
    }

    /**
     * Order by update date asc
     *
     * @return     MessageQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(MessagePeer::MODIFICATION_DATE);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     MessageQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(MessagePeer::CREATION_DATE, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     MessageQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(MessagePeer::CREATION_DATE);
    }

    /**
     * Order by create date asc
     *
     * @return     MessageQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(MessagePeer::CREATION_DATE);
    }
    // senchagridable behavior

    /**
     * Paginate results
     *
     * @param Symfony\Component\HttpFoundation\ParameterBag
     * @return MessageQuery
     */
    public function paginateGrid($params)
    {
        return $this
            ->addGridFiltersQuery($params)
            ->addGridSortQuery($params)
            ->paginate(
                $params->get('page'),
                $params->get('limit')
            );
    }

    /**
     * Added sort filter on query
     *
     * @param Symfony\Component\HttpFoundation\ParameterBag
     * @return MessageQuery
     */
    public function addGridSortQuery($params)
    {
        if ($params->get('sort')) {
            $sorts = json_decode($params->get('sort'));
            foreach ($sorts as $sort) {
                $orderBy = "orderBy".ucfirst($sort->property);
                $this->$orderBy(strtolower($sort->direction));
            }
        }

        return $this;
    }

    /**
     * Added sort filter on query
     *
     * @param Symfony\Component\HttpFoundation\ParameterBag
     * @return MessageQuery
     */
    public function addGridFiltersQuery($params)
    {
        $i = 0;
        $fields = $this->getFields($params);
        if (!empty($fields)) {
            $orConds = array();
            foreach ($fields as $field) {
                $this->condition(
                    "cond$i",
                    'Sencha\TicketBundle\Model\Message.'.ucfirst($field).' LIKE ?',
                    "%{$params->get('query')}%"
                );

                $orConds[] = "cond$i";
                $i++;
            }

            $this->where($orConds, 'or');
        }

        $filter = $this->getFilter($params);
        if (!empty($filter)) {
            $andConds = array();
            $count = count($filter);
            for ($j = 0; $j < $count; $j++) {

                switch($filter[$j]['data']['type']) {
                    case 'string': {
                        $this->condition(
                            "cond$i",
                            'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' LIKE ?',
                            "%{$filter[$j]['data']['value']}%"
                        ); break;
                    }
                    case 'list': {
                        if (strstr($filter[$j]['data']['value'], ',')) {
                            $this->condition(
                                "cond$i",
                                'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' IN ?',
                                explode(',', $filter[$j]['data']['value'])
                            );
                        } else {
                            $this->condition(
                                "cond$i",
                                'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' = ?',
                                $filter[$j]['data']['value']
                            );
                        } break;
                    }
                    case 'boolean': {
                        $this->condition(
                            "cond$i",
                            'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' = ?',
                            "{$filter[$j]['data']['value']}"
                        ); break;
                    }
                    case 'numeric': {
                        switch ($filter[$j]['data']['comparison']) {
                            case 'ne': {
                                $this->condition(
                                    "cond$i",
                                    'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' != ?',
                                    "{$filter[$j]['data']['value']}"
                                ); break;
                            }
                            case 'eq': {
                                $this->condition(
                                    "cond$i",
                                    'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' = ?',
                                    "{$filter[$j]['data']['value']}"
                                ); break;
                            }
                            case 'lt': {
                                $this->condition(
                                    "cond$i",
                                    'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' < ?',
                                    "{$filter[$j]['data']['value']}"
                                ); break;
                            }
                            case 'gt': {
                                 $this->condition(
                                    "cond$i",
                                    'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' > ?',
                                    "{$filter[$j]['data']['value']}"
                                ); break;
                            }
                        } break;
                    }
                    case 'date': {

                        switch ($filter[$j]['data']['comparison']) {
                            case 'ne': {
                                $this->condition(
                                    "cond$i",
                                    'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' != ?',
                                    date('Y-m-d', strtotime($filter[$j]['data']['value']))
                                ); break;
                            }
                            case 'eq': {
                                $this->condition(
                                    "cond$i",
                                    'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' = ?',
                                    date('Y-m-d', strtotime($filter[$j]['data']['value']))
                                ); break;
                            }
                            case 'lt': {
                                $this->condition(
                                    "cond$i",
                                    'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' < ?',
                                    date('Y-m-d', strtotime($filter[$j]['data']['value']))
                                ); break;
                            }
                            case 'gt': {
                                $this->condition(
                                    "cond$i",
                                    'Sencha\TicketBundle\Model\Message.'.ucfirst($filter[$j]['field']).' > ?',
                                    date('Y-m-d', strtotime($filtrer[$j]['data']['value']))
                                ); break;
                            }
                        }
                    } break;
                }
                $andConds[] = "cond$i";
                $i++;
            }
            if (!empty($andConds)) $this->where($andConds, 'and');
        }

        return $this;
    }

    /**
     * Get fields from request
     *
     * @param Symfony\Component\HttpFoundation\ParameterBag
     * @return array
     */
    protected function getFields($params) {
        return json_decode($params->get('fields'));
    }

    /**
     * Get filter from request
     *
     * @param Symfony\Component\HttpFoundation\ParameterBag
     * @return array
     */
    protected function getFilter($params) {
        return $params->get('filter');
    }


}
