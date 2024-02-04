<?php

class Model
{
    public $table = "users";
    use Database;
    function insert($data)
    {
        $keys = array_keys($data);
        $columns = "`" . implode("`,`", $keys) . "`";
        $values = array_values($data);
        $fields = "'".implode("','", $values)."'";
        $query = "INSERT INTO `$this->table` ($columns) VALUES ($fields)";
        return $this->query_execute($query);
    }
    function numrows()
    {
        $query = "select * from `$this->table`";
        $result =  $this->query_execute($query);
        $numrows = mysqli_num_rows($result);
        return $numrows;
    }
}
