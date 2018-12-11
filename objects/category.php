<?php
class Category{
    //database connection and table name
    private $conn;
    private $table_name = "category";

    //object properties
    public $id;
    public $name;
  
    //constructor
    public function __construct($db){
        $this->conn = $db;
    }


    function getKind($id){
        //select query
        $query = "SELECT name
                FROM ". $this->table_name ."
                WHERE id = ?
            ";
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //sanitize
        $this->id = $id;

        //bind product id variable
        $stmt->bindParam(1, $this->id);
        // execute query
        $stmt->execute();

        // return values
        return $stmt;
    }
}
?>
