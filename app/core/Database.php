<?php

class Database extends PDO
{
    public function __construct()
    {
        $options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];

        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

        parent::__construct($dsn, DB_USER, DB_PASS, $options);

        $this->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}