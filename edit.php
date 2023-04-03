<?php 
    include('function.php');

    $objcrudpro = new crud_project(); 

    $students = $objcrudpro->display_data();

    if(isset($_GET['status'])){

        if($_GET['status'] = "edit"){
            $id = $_GET['id'];

           $returnid = $objcrudpro->display_data_by_id($id);
        }
    }

    if(isset($_POST['u_edit_button'])){
        $upadte_data = $objcrudpro->update_data($_POST);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta Tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Site title-->
    <title>Dynamic CRUD Projects</title>

    <!--Bootstrap CSS Link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

    <div class="container my-4 p-4 shadow"> 
        <h2><a style="text-decoration: none;" href="index.php">Student Information</a></h2>
        
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <?php if(isset($upadte_data)) {echo $upadte_data;} ?>

                <input class="form-control mb-2" type="text" name="u_std_name" value="<?php echo $returnid['std_name']; ?>">
                <input class="form-control mb-2" type="number" name="u_std_roll" value="<?php echo $returnid['std_roll']; ?>">
                <label for="image">Upload Your Image</label>
                <input class="form-control mb-2" type="file" name="u_std_img" >
                <input type="hidden" name="u_std_id" value="<?php echo $returnid['id']; ?>">
                <input type="submit" name="u_edit_button" value="Update information" class="form-control bg-warning">
        </form>
        </div>


    <!--Bootstrap JS Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
