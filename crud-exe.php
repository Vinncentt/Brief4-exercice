<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php require 'connection.php'; ?>
        
    <div class="container">
    <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'crud');
        $result = $mysqli->query("SELECT * FROM datastudent ");
        // pre_r($result);
        ?>

        <div class="row justify-content-center">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php 
            while($row = $result->fetch_assoc()):
        ?>
    
                <tr>
                    <td><?php echo $row['nameS']; ?></td>
                    <td><?php echo $row['last_nameS']; ?></td>
                    <td>
                        <a href="crud-exe.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="connection.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
        <?php endwhile; ?>
            </table>
        </div>
        <?php
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre';       
        }
        ?>
    <div style="width: 100%;" class="mt-5 d-flex justify-content-center"">
        <form style="width: 500px;" action="connection.php" method="POST">
            <input type="hidden"  name="id" value="<?php echo $id; ?>">
            <div class="form-group ">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>" placeholder="Enter the name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>" placeholder="Enter the last name">
            </div> 
            <div class="form-group">
            <?php 
            if ($update== true):
            ?>
            <button style="margin-top: 10px;" type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
            <button style="margin-top: 10px;" type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
            </div>
        </form>
    </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> 
</body>
</html>