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
