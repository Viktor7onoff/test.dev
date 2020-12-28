<?php
declare(strict_types=1);

namespace component;

class DB
{
    private $host;
    private $user;
    private $pass;
    private $db;

    private $connect;
    protected static $_instance;

    public function __construct()
    {
        if (!isset($_ENV["DB_CONFIG"])) {
            throw new Exception('Не найдена конфигурация базы данных');
        }

        $this->host = $_ENV["DB_CONFIG"]['host'];
        $this->db = $_ENV["DB_CONFIG"]['db'];
        $this->user = $_ENV["DB_CONFIG"]['user'];
        $this->pass = $_ENV["DB_CONFIG"]['pass'];

        $this->connect = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->pass);

        if (!$this->connect) {
            throw new SQLException('Невозможно установить соединения с БД.', 100);
        }
    }

    private function __clone()
    {
    }

    final public function __destruct()
    {
        self::$_instance = null;
    }

    public static function getInstance() // получить экземпляр данного класса
    {
        if ( empty(self::$_instance) ) { // если экземпляр данного класса  не создан
            self::$_instance = new self;  // создаем экземпляр данного класса
        }
        return self::$_instance; // возвращаем экземпляр данного класса
    }


    /**
     * Выполнение запросов вида insert, update.
     *
     * @param string $sql
     * @return int количество затронутых строк
     */
    public function execute($sql)
    {
        $object = self::$_instance;

        $sth = $object->connect->prepare($sql);
        if ($sth->execute() === FALSE) {
            throw new Exception('Невозможно выполнить запрос: "'.$sql.'"', 101);
        }

        return $sth->rowCount();
    }

    /**
     * Выполнение запросов на выборку.
     *
     * @param string $sql
     * @return array результат запроса
     */
    public function query($sql)
    {
        $object = self::$_instance;

        $sth = $object->connect->prepare($sql);

        if ($sth === FALSE) {
            throw new Exception('Невозможно выполнить запрос: "'.$sql.'"', 102);
        }

        $sth->execute();

        return $sth->fetchAll();
    }
}
