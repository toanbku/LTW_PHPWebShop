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
    function getInfo($id){
        $this->id = $id;

        //SELECT all product query
        $query = "SELECT 
                    email, firstName, lastName, type
                FROM
                    ".$this->table_name
                ."WHERE id=:id";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id
        $stmt->bindParam(":id",  $this->id);

        //execute query
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            echo "email la: ".$email;  
            $this->email = $email;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }

        return $stmt;
        
    }

}


?>