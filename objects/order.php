<?php
// 'Order' object

class Order{
    private $conn;
    private $table_name = "orders";

    //properties
    public $transaction_id;
    public $user_id;
    public $total_cost;
    public $status;
    public $created;


    //constructor
    public function __construct($db){
        $this->conn = $db;
    }
    
   //read all products 
    function getInfo($id){
        $this->user_id = $id;

        //SELECT all product query
        $query = "SELECT 
                    transaction_id, user_id, total_cost, status, created
                FROM
                    ".$this->table_name
                ." WHERE user_id=:user_id";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id
        $stmt->bindParam(":user_id",  $this->user_id);

        //execute query
        $stmt->execute();
        


        return $stmt;

    }
    
    //read all products for all order
    function getAllInfo(){

        //SELECT all product query
        $query = "SELECT 
                    transaction_id, user_id, total_cost, status, created
                FROM
                    ".$this->table_name
                ."";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id
        //$stmt->bindParam(":user_id",  $this->user_id);

        //execute query
        $stmt->execute();
    
        return $stmt;
    }


    public function count($id){
        $this->user_id = $id;


        //query to count all products records
        $query = "SELECT count(*) FROM  ".$this->table_name
        ." WHERE user_id=:user_id";

        //prepare query statement
        $stmt = $this->conn->prepare($query);
        

        // bind id
        $stmt->bindParam(":user_id",  $this->user_id);

        //execute query 
        $stmt->execute();

        //get row value
        $rows = $stmt->fetch(PDO::FETCH_NUM);
        
        //return count
        return $rows[0];

    }


}


?>