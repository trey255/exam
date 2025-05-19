<?php
$conn = new mysqli('localhost', 'root', '', 'groupe');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $query = "SELECT * FROM success WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "User not found!";
        exit;
    }
} else {
    echo "ID not provided!";
    exit;
}



if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $updateQuery = "UPDATE success name='$username', email='$email', password='$password' WHERE id='$id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "
        <script>
            alert('User updated successfully');
            window.location.href = 'delete.php';
        </script>";
    } else {
        echo "Update failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>

<h1>Update User</h1>

<form method="post" style="width: 300px; margin: 0 auto; background-color: white; padding: 20px; border-radius: 10px;">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

    <label>Password:</label><br>
    <input type="text" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>