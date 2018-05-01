<?php
require_once 'config.php';
$result = false;

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate

    $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
    $query = $pdo->prepare($sql);

    $result = $query->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mannarino Moises	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h3>Databases</h3>
	<a href="index.php">Home</a>
	<?php
        if ($result) {
            echo '<div class="alert alert-success">Success!!!</div>';
        }
    ?>
    <div class="form-group col-md-4" >
	<form action="add.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control"  id="name">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control"  id="email">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control"  id="password">
        <br>
        <input type="submit" value="Save" class="btn btn-primary">
    </form>
    </div>
</div>
</body>
</html>