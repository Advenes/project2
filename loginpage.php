<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
    require_once ("base.php");
    ?>

LOGIN <a href="index.php">INDEX</a>
<form method="post" action="backendLoginPage.php">

<input type="name" name="name" required>
<input type="email"name="email" required>
<input type="password" name="password" required>
<input type="submit" name="button" value="zaloguj sie">

</form>

</body>
</html>