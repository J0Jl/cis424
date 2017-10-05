<?php

$size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
$p_array = filter_input(INPUT_POST, 'pizzas', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
$t_array = filter_input(INPUT_POST, 'toppings', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
$instructions = filter_input(INPUT_POST, 'instructions', FILTER_SANITIZE_SPECIAL_CHARS);
$pass_finite = 'noneshallpass';



if ($email === FALSE) {
    $error_message = 'Email must be valid.';
} else if (empty ($email)){
    $error_message = 'Email cannot be Blank.';
} else if(empty ($password)){
    $error_message = 'Password cannot be Empty';
} else if ($password !== $pass_finite){
    $error_message = 'Incorrect Password.';
} else if (empty ($size)) {
    $error_message = 'A size needs to be chosen.';
} else if ($p_array == NULL){
    $error_message = 'Please choose a type.';
}

else {
    $error_message = '';
}

if ($error_message != '') {
    include('pizzaOrder.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Review Order</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>

        <main>
    <h1>Mimo's Pizza Review Order</h1>
    <br><br>
    
    <label>Pizza Size:</label>
    <span><?php echo $size; ?></span>
    <br><br>
    
    <label>Pizza(s):</label>
    <span><?php foreach ($p_array as $key => $value) {
        echo $key. ' = ' .$value.'<br>';} ?>
    </span>
    <br><br>
    
    <label>Extra Toppings:</label>
    <span><?php foreach ($t_array as $key => $value) {
        echo $key. ' = ' .$value.'<br>';} ?></span>
    <br><br>
    
    <label>Email:</label>
    <span><?php echo $email; ?></span>
    <br><br>
    
    <label>Special Instructions:</label>
    <span><?php echo str_replace('&#10;', '<br>', $instructions); ?></span>
    <br><br>
    
    
    
        </main>
    </body>
</html>