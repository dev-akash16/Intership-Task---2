<?php
include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $conn->query("
        UPDATE users
        SET
        name='$name',
        email='$email',
        phone='$phone',
        address='$address'
        WHERE id=$id
    ");

    header("Location: manage_users.php");
}
?>

<form method="POST">

Name:<br>
<input type="text" name="name"
value="<?php echo $user['name']; ?>"><br><br>

Email:<br>
<input type="email" name="email"
value="<?php echo $user['email']; ?>"><br><br>

Phone:<br>
<input type="text" name="phone"
value="<?php echo $user['phone']; ?>"><br><br>

Address:<br>
<textarea name="address"><?php echo $user['address']; ?></textarea><br><br>

<input type="submit" name="update" value="Update User">

</form>