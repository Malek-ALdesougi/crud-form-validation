<?php
include_once("connection.php");
try {
    $sql = $connection->prepare("SELECT id, fullname, email, number, password, DateCreated, lastLogin FROM `users data`");
    $sql->execute();
    $rows = $sql->fetchAll();
} catch (PDOException $e) {
    echo "failed fetch data" . $e->getMessage();
}

// DLETER ROW FOR THE ADMIN ROW ;
try {

    if (isset($_POST['delete'])) {
        $deleteID = $_POST['deleteID'];
        $deleteQuery = "DELETE FROM `users data` WHERE id=?";
        $stmt = $connection->prepare($deleteQuery);
        $stmt->execute([$deleteID]);
        header("Location: admin.php");
    }
} catch (PDOException $r) {
    echo "failed delete row " . $r->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>


<div style="text-align:center; background-color:darkgray;">
    <h1 style="font-family:cursive;">Admin Page</h1>
</div>

<body style="background-color:darkgray;">
    <div style="height:600px; display: flex; align-items:center; justify-content:center; background-color:darkgray" class="container">
        <table class="table">
            <thead class="border">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Date last login</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) {

                    $idnew = $row['id'];
                    $name = $row['fullname'];
                    $num = $row['number'];
                    $email = $row['email'];
                    $pass = $row['password'];
                    $dateCreated = $row['DateCreated'];
                    $lastLogin = $row['lastLogin'];

                    if ($email == 'Admin@admin.com') {
                        continue;
                    }
                ?>
                    <tr>
                        <th scope="row"><?php echo $idnew ?></th>
                        <td><?php echo $name ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $pass ?></td>
                        <td><?php echo $dateCreated ?></td>
                        <td><?php echo $lastLogin ?></td>
                        <td>
                            <form action="update.php" method="POST">
                                <input name="thisID" type="hidden" value="<?php echo $idnew ?>">
                                <input name="name" type="hidden" value="<?php echo $name ?>">
                                <input name="number" type="hidden" value="<?php echo $num ?>">
                                <input name="email" type="hidden" value="<?php echo $email ?>">
                                <input name="pass" type="hidden" value="<?php echo $pass ?>">
                                <input name="datecreated" type="hidden" value="<?php echo $dateCreated ?>">
                                <input name="lastlogin" type="hidden" value="<?php echo $lastLogin ?>">
                                <input style="width: 80px;" name="adminUpdate" type="submit" class="btn btn-success" value="Edit">
                            </form>
                        </td>
                        <td>
                            <form action="#" method="POST">
                                <input type="hidden" name="deleteID" value="<?php echo $idnew ?>">
                                <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>