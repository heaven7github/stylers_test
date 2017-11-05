<?php

/**
 * Class Model_Tree
 */
class Model_Tree extends Dao
{

    /**
     * @var string
     */
    protected $_calculatedSolution = '';

    /**
     * Model_Tree constructor.
     */
    public function __construct()
    {
        if (!defined('PDO::MYSQL_ATTR_LOCAL_INFILE')) {
            throw new Exception('A PHP.ini fájlban nincs engedélyezve a PDO');
        }
        try {
            $db = new PDO('mysql:host=localhost;', DB_USER, DB_PASSWORD, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION]);
        } catch (Exception $e) {
            throw new Exception('Nem sikerült kapcsolódni a kiszolgálóhoz');
        }
        parent::__construct($db);
    }

    /**
     * get tree
     *
     * @param int $parentId parent id
     *
     * @return array
     */
    function getTree($parentId = 0, $depth = 0, $calculateSolution = false)
    {
        $this->db->exec('use ' . DB_NAME);
        $stmt = $this->db->prepare("SELECT * FROM tree where parent_id=:parent_id");
        $stmt->bindValue(':parent_id', $parentId, PDO::PARAM_INT);
        $stmt->execute();
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($calculateSolution) {
                if (((int)$row['first_value']) & (int)$row['second_value'] & ($depth + 1)) {
                    $this->_calculatedSolution .= $row['second_key'];
                } else {
                    $this->_calculatedSolution .= $row['first_key'];
                }
            }
            $row['children'] = $this->getTree($row['id'], $depth + 1, $calculateSolution);
            $row['depth'] = $depth;
            $data[] = $row;
        }

        return $data;
    }

    public function getSolution()
    {
        $this->getTree(0, 0, true);
        return $this->_calculatedSolution;
    }

    /**
     * create db
     *
     * @return void
     */
    function createDb()
    {
        $this->db->exec('CREATE DATABASE IF NOT EXISTS ' . DB_NAME . ';');
        $this->db->exec('use ' . DB_NAME);
    }

    /**
     * create table
     *
     * @return void
     */
    function createTable()
    {
        $this->db->exec('CREATE TABLE `tree` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `first_key` varchar(10) NOT NULL,
  `first_value` int(11) NOT NULL,
  `second_key` varchar(10) NOT NULL,
  `second_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;');

        $this->db->exec('ALTER TABLE `tree`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);');

        $this->db->exec('ALTER TABLE `tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;');
    }

    /**
     * truncate table
     */
    function truncateTable()
    {
        $this->db->exec('TRUNCATE TABLE `tree`;');
    }

    /**
     * save tree
     *
     * @param array $tree tree
     * @param int $parentId parent id
     *
     * @return void
     *
     * @throws Exception
     */
    function saveTree($tree, $parentId = 0)
    {
        foreach ($tree as $data) {

            $tmp = [];
            foreach ($data as $key => $element) {
                if ('childs' != $key) {
                    $tmp[] = $key;
                    $tmp[] = $element;
                }
            }

            $stmt = $this->db->prepare('INSERT INTO tree (parent_id, first_key, first_value, second_key, second_value) VALUES(?,?,?,?,?)');

            try {
                $stmt->execute([$parentId, $tmp[0], $tmp[1], $tmp[2], $tmp[3]]);
                $lastId = $this->db->lastInsertId('id');
                if (isset($data['childs'])) {
                    $this->saveTree($data['childs'], $lastId);
                }

            } catch (PDOExecption $e) {
                throw new Exception('Hiba történt az adatok mentése közben');
            }
        }
    }

}