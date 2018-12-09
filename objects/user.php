<?php
// 'User' object

class User{
    private $conn;
    private $table_name = "users";

    //properties
    public $id;
    public $email;
    public $userName;
    public $firstName;
    public $lastName;


    //constructor
    public function __construct($db){
        $this->conn = $db;
    }
    
   //read all products 
    function getInfo($userName){
        $this->userName = $userName;

        //SELECT all product query
        $query = "SELECT 
                    id, email, firstName, lastName, type
                FROM
                    ".$this->table_name;
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();
        
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $this->id = $id;
            $this->email = $email;
            $this->firstName = $firstName;
            $this->lastName = $lastName;

        }
        // return $stmt;
    }

//     //used for paging products
//     public function count(){
//         //query to count all products records
//         $query = "SELECT count(*) FROM ". $this->table_name;

//         //prepare query statement
//         $stmt = $this->conn->prepare($query);
        
//         //execute query 
//         $stmt->execute();

//         //get row value
//         $rows = $stmt->fetch(PDO::FETCH_NUM);
        
//         //return count
//         return $rows[0];

//     }
    
//     // used when filling up the update product form
//     function readOne(){
    
//         // query to select single record
//         $query = "SELECT
//                     name, description, price
//                 FROM
//                     " . $this->table_name . "
//                 WHERE
//                     id = ?
//                 LIMIT
//                     0,1";
    
//         // prepare query statement
//         $stmt = $this->conn->prepare( $query );
    
//         // sanitize
//         $this->id=htmlspecialchars(strip_tags($this->id));
    
//         // bind product id value
//         $stmt->bindParam(1, $this->id);
    
//         // execute query
//         $stmt->execute();
    
//         // get row values
//         $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
//         // assign retrieved row value to object properties
//         $this->name = $row['name'];
//         $this->description = $row['description'];
//         $this->price = $row['price'];
//     }
}


?>