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
    public function numrows()
    {
        $query = "select * from `$this->table`";
        $result =  $this->query_execute($query);
        $numrows = mysqli_num_rows($result);
        return $numrows;
    }

    public function where($data){
        $string = '';
        foreach($data as $key => $value){
            $string .= $key."="."$value"."&&";
        };

        $string = rtrim($string, "&&");
        $query = "select * from `$this->table` where $string";
        $result =  $this->query_execute($query);
        return $result;
    }

    public function delete($id){
        $query = "delete from `$this->table` where id=$id";
        $result =  $this->query_execute($query);
        return $result;
    }
}
