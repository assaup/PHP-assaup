<?php
namespace src\Services;

class Db
{
    // экземпляр PDO, через который выполняются запросы к базе данных
    private $pdo;

    // Статическое свойство для хранения единственного экземпляра класса Db (реализация паттерна Singleton)
    private static $instance;

    // Приватный конструктор — нельзя создать объект класса напрямую извне, только через getInstance()
    private function __construct()
    {
        $dbOptions = require('settings.php');
        // Создание подключения к базе через PDO
        $this->pdo = new \PDO(
            'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    // публичный метод для выполнения SQL-запросов
    public function query(string $sql, array $params = [], string $className = 'stdClass'): array
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $className);
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function getLastInsertId(): int
    {
        return (int)$this->pdo->lastInsertId();
    }
    // реализация Singleton
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}