<?php
$conn = new mysqli('localhost', 'root', '', 'groupe');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM success";  // Fetch data from the 'success' table
$query = mysqli_query($conn, $sql);

// Handle delete operation
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Ensure proper escaping to prevent SQL injection (or use prepared statements)
    $id = mysqli_real_escape_string($conn, $id);

    // Fixed the table name to match the one you're selecting from
    $sql = "DELETE FROM success WHERE id = '$id'";
    $delete = mysqli_query($conn, $sql);

    if ($delete) {
        echo "
        <script>
            alert('Data deleted');
            location.href='delete.php';  // Make sure to close the quote properly
        </script>
        ";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="delete.css">
</head>
<body>

<table border="1">
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
    </tr> 
    <?php while ($user = mysqli_fetch_assoc($query)): ?>
    <tr>
        <td><?php echo htmlspecialchars($user['username']); ?></td>
        <td><?php echo htmlspecialchars($user['email']); ?></td>
        <td><?php echo htmlspecialchars($user['password']); ?></td>
        <td>
            <form method="post" action="" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <button type="submit" name="delete">Delete</button>
            </form>
            <a href="update.php?id=<?php echo $user['id']; ?>" style="text-decoration: none;">
                <button type="button">Edit</button>
            </a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
