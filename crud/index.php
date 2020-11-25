<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="croud my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">



                    <?php

spl_autoload_register(function ($class) {
    include "classes/" . $class . ".php";
});

$user = new Student;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $regi = $_POST['regi'];

    $user->setName($name);
    $user->setRoll($roll);
    $user->setRegistration($regi);

    if ($user->insert()) {
        echo "Data insert successfully";
    } else {
        echo "Data not saved";
    }
}

if (isset($_POST['update'])) {
    $id   = $_POST['id'];
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $regi = $_POST['regi'];

    $user->setName($name);
    $user->setRoll($roll);
    $user->setRegistration($regi);

    if ($user->update($id)) {
        echo "Data updated successfully";
    } else {
        echo "Data not updated";
    }
}

?>

<?php

if (isset($_GET['action']) && $_GET['action'] == 'Delete') {
    $id = $_GET['id'];
    if ($user->delete($id)) {
        echo "Data deleted successfully";
    }else{
        echo "Data not deleted";
    }
}

?>


 <?php

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['id'];
    $result = $user->readByid($id);


?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <input type="text" value="<?php echo $result['name']; ?>" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Roll: </label>
                            <input type="text" value="<?php echo $result['roll']; ?>" name="roll" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Registration no: </label>
                            <input type="text" value="<?php echo $result['regi_no']; ?>" name="regi"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="Submit" name="update" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                    <?php 
                    
                } else { 

                ?>



                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Roll: </label>
                            <input type="text" name="roll" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Registration no: </label>
                            <input type="text" name="regi" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="Submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                    <?php  
                }
                    ?>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr class="table-primary">
                            <td>Name</td>
                            <td>Roll</td>
                            <td>Registration no</td>
                            <td>Action</td>
                        </tr>

                        <?php

                        foreach ($user->readAll() as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['roll']; ?></td>
                            <td><?php echo $value['regi_no']; ?></td>
                            <td>
                                <?php echo "<a class='btn btn-primary' href='index.php?action=edit&id=" . $value['id'] . "'>Edit</a>"; ?>
                            <?php echo "<a class='btn btn-warning' href='index.php?action=Delete&id=" . $value['id'] . "' onClick='return confirm(\"Are you sure to delete it..?\")'>Delete</a>"; ?>
                            </td>
                        </tr>
                        <?php }

                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>