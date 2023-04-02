<?php 
    include('function.php');

    $objcrudpro = new crud_project(); 

    if(isset($_POST['std_button'])){

     $return_msg = $objcrudpro->add_info($_POST);
    }

    $students = $objcrudpro->display_data();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Mera Tags-->
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
            <?php if(isset($return_msg)) {echo $return_msg;} ?>

                <input class="form-control mb-2" type="text" name="std_name" placeholder="Enter You Name" >
                <input class="form-control mb-2" type="number" name="std_roll" placeholder="Enter You Roll" >
                <label for="image">Upload Your Image</label>
                <input class="form-control mb-2" type="file" name="std_img" >
                <input type="submit" name="std_button" value="Add information" class="form-control bg-warning">
        </form>
        </div>

        <div class="container my-4 p-4 shadow">
            <table class="table ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>

                <?php while($student = mysqli_fetch_assoc($students)){ ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo $student['std_name']; ?></td>
                        <td><?php echo $student['std_roll']; ?></td>
                        <td><img style="height:100px;" src="upload/<?php echo $student['std_img'];?>"></td>
                        <td>
                            <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student['id']; ?>">Edit</a>
                            <a class="btn btn-warning" href="#">Delete</a>
                        </td> 
                    </tr> 

                    <?php } ?>

                </tbody>
                
            </table>

        </div>

   
 


    




    <!--Bootstrap JS Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>