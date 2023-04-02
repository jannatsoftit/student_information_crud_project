<?php

class crud_project{

private $conn;

    public function __construct(){
        /*database host, database user, database name, database pass*/

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "crudproject";

        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if(!$this->conn){
            die("Database Connection Error!!");
        } 
    }


     public function add_info($data){
        $std_name = $data['std_name'];
        $std_roll = $data['std_roll'];
        $std_img = $_FILES['std_img']['name'];
        $tmp_img = $_FILES['std_img']['tmp_name'];

        $query = "INSERT INTO students(std_name, std_roll, std_img) VALUE('$std_name',$std_roll,'$std_img')";

        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_img, "upload/".$std_img);
            return "Information Added Successfully";
        }
     }


     public function display_data(){
        $query = "SELECT * FROM students";

        if(mysqli_query($this->conn, $query)){
            $returndata = mysqli_query($this->conn, $query);

            return $returndata;
        }
     }

}












?>