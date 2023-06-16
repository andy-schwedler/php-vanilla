<?php

class Database
{
    private $connection;
    private $statement;

    public function __construct($config, $username = "root", $password = "")
    {
        // config is stored in config.php
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = [])
    {
        if (!$query) {
            throw new Exception("What is wrong with you - QUERY IS MISSING");
        }
        $this->statement = $this->connection->prepare($query);

        // To defend agains SQL INJECTION - binding is happening here to
        // let the Query and the bound parameters travel in different boats
        // defaults to empty array
        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }

    public function find()
    {
        return $this->statement->fetch();
    }
}
