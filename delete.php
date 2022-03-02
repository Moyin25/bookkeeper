<?php
include('connection.php');

// sql to delete a record
$sql = "DELETE FROM BOOKKEEPER WHERE id=$id";

if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}

mysqli_close($db);
?>




$sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

