<?php

require_once 'core/init.php';

if ( Input::get('submit') ){
    echo 'lol';
}

require_once 'templates/header.php';

?>

<h2>Daftar</h2>

<form action="register.php" method="post">
    <label> Username </label>
    <input type="text" name="username" > <br>
    
    <label> Password </label>
    <input type="password" name="password" > <br>

    <input type="submit" name="submit" value="Daftar">
</form>

<?php require_once 'templates/footer.php'; ?>

