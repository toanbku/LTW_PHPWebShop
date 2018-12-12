<?php
// 'product' object

class Product{
    private $conn;
    private $table_name = "products";

    //properties
    public $id;
    public $name;
    public $price;
    public $description;
    public $kind;
    public $timestamp;

    //constructor
    public function __construct($db){
        $this->conn = $db;
    }
    
   //read all products 
    function read($from_record_num, $records_per_page){

        //SELECT all product query
        $query = "SELECT 
                    id, name, description, price, kind
                FROM
                    ".$this->table_name ."
                ORDER BY 
                    created DESC
                LIMIT
                    ?, ?";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //blind limti clause variables
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        //execute query
        $stmt->execute();
        
        //return value
        return $stmt;


    }

    //used for paging products
    public function count(){
        //query to count all products records
        $query = "SELECT count(*) FROM ". $this->table_name;

        //prepare query statement
        $stmt = $this->conn->prepare($query);
        
        //execute query 
        $stmt->execute();

        //get row value
        $rows = $stmt->fetch(PDO::FETCH_NUM);
        
        //return count
        return $rows[0];

    }
    
    // used when filling up the update product form
    function readOne(){
    
        // query to select single record
        $query = "SELECT
                    name, description, price
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind product id value
        $stmt->bindParam(1, $this->id);
    
        // execute query
        $stmt->execute();
    
        // get row values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // assign retrieved row value to object properties
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->price = $row['price'];
    }

    // read all product based on product ids included in the $ids variable
    // reference http://stackoverflow.com/a/10722827/827418
    public function readByIds($ids){
    
        $ids_arr = str_repeat('?,', count($ids) - 1) . '?';
        
        // query to select products
        $query = "SELECT id, name, price FROM " . $this->table_name . " WHERE id IN ({$ids_arr}) ORDER BY name";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute($ids);
    
        // return values from database
        return $stmt;
    }
}


?>