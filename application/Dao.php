<?php

/**
 * Class Dao
 */
abstract class Dao
{
    /**
     * @var PDO
     */
    protected $db;

    /**
     * Dao constructor.
     *
     * @param PDO $db db connection
     *
     * @return void
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * set db
     *
     * @param PDO $db
     *
     * @return void
     */
    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * get db
     *
     * @return PDO
     */
    public function getDb()
    {
        return $this->db;
    }
}