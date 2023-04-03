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

     public function display_data_by_id($id){ 
        $query = "SELECT * FROM students WHERE id= $id";

        if(mysqli_query($this->conn, $query)){
            $returndata = mysqli_query($this->conn, $query);
            $studentdata = mysqli_fetch_assoc($returndata);

            return $studentdata;
        }
     }

     public function update_data($data){ 

        $std_name = $data['u_std_name'];
        $std_roll = $data['u_std_roll'];
        $idno = $data['u_std_id'];
        $std_img = $_FILES['u_std_img']['name'];
        $tmp_name = $_FILES['u_std_img']['tmp_name'];

        $query = "UPDATE students SET std_name='$std_name', std_roll=$std_roll, 
        std_img='$std_img' WHERE id=$idno";

        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name, "upload/".$std_img);
            return "Information Updated Successfully";
        }

     }


     public function delete_data($id){
        $catch_img = "SELECT * FROM students WHERE id = $id";
        $deletestd_info = mysqli_query($this->conn, $catch_img);
        $std_info = mysqli_fetch_assoc($deletestd_info);
        $deleteImg_data = $std_info['std_img'];

        $query = "DELETE FROM students WHERE id=$id";

        if(mysqli_query($this->conn, $query)){
           unlink('upload/'.$deleteImg_data);
            return "Information Deleted Successfully";
        }

     }





}












?>
