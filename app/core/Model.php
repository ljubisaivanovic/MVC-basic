<?php

class Model
{
    protected $connection = null;
    protected $table = '';
    protected $fillable = [];

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function all()
    {
        $prepare = $this->connection->prepare("SELECT * FROM `$this->table`");
        $prepare->execute();

        $results = $prepare->fetchAll();
        $output = [];

        foreach ($results as $result) {
            $model = new static();

            foreach($result as $key => $value) {
                $model->$key = $value;
            }

            $output[$result['id']] = $model;
        }

        return $output;
    }

    public function get($column, $value)
    {
        $prepare = $this->connection->prepare("SELECT * FROM `$this->table` WHERE `$column` = '$value';");
        $prepare->execute();

        $result = $prepare->fetch();

        if ($result) {
            foreach($result as $key => $value) {
                $this->$key = $value;
            }

            return $this;
        } else {
            throw new Exception("No results");
        }
    }

    public function find($id)
    {
        return $this->get('id', $id);
    }

    public function insert()
    {
        if (!empty($this->fillable)) {
            $columns = [];
            $values = [];

            foreach ($this->fillable as $key) {
                array_push($columns, $key);
                array_push($values, $this->$key);
            }

            $columns = "`" . implode("`,`", $columns) . "`";
            $values = "'" . implode("','", $values) . "'";

            $prepare = $this->connection->prepare("INSERT INTO `$this->table` ($columns) VALUES ($values);");
            $prepare->execute();

            $this->id = $this->connection->lastInsertId();
        }

        return $this;
    }

    public function update()
    {
        if (!empty($this->fillable)) {
            $update = '';

            foreach ($this->fillable as $key) {
                $update .= "`" . $key . "`" . '=' . "'" . $this->$key . "',";
            }

            $update = substr($update, 0, -1);

            $prepare = $this->connection->prepare("UPDATE `$this->table` SET $update WHERE `id` = $this->id;");
            $prepare->execute();
        }

        return $this;
    }

    public function delete()
    {
        $prepare = $this->connection->prepare("DELETE FROM `$this->table` WHERE `id` = $this->id;");
        $prepare->execute();

        unset($this->id);
        foreach ($this->fillable as $key) {
            unset($this->$key);
        }

        return $this;
    }

    public function data()
    {
        $output = [];

        $output['id'] = $this->id;
        foreach($this->fillable as $key) {
            $output[$key] = $this->$key;
        }

        return $output;
    }
}
