<?php
class ProductImage{
    //database connection and table name
    private $conn;
    private $table_name = "product_images";

    //object properties
    public $id;
    public $product_id;
    public $name;
    public $timestamp;

    //constructor
    public function __construct($db){
        $this->conn = $db;
    }


    function readFirst(){
        //select query
        $query = "SELECT id, product_id, name
                FROM ". $this->table_name ."
                WHERE product_id = ?
                ORDER BY name DESC
                LIMIT 0,1
            ";

        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind product id variable
        $stmt->bindParam(1, $this->product_id);
        // execute query
        $stmt->execute();

        // return values
        return $stmt;
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

    // read all product image related to a product
    function readByProductId(){
    
        // select query
        $query = "SELECT id, product_id, name
                FROM " . $this->table_name . "
                WHERE product_id = ?
                ORDER BY name ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // sanitize
        $this->product_id=htmlspecialchars(strip_tags($this->product_id));
    
        // bind prodcut id variable
        $stmt->bindParam(1, $this->product_id);
    
        // execute query
        $stmt->execute();
    
        // return values
        return $stmt;
    }
}

?>