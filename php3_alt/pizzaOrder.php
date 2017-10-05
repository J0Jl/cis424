<?php
if (!isset($email)) {$email = '';}
if (!isset($password)) {$password = '';}
if (!isset($instructions)) {$instructions = '';}


$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_FLOAT);
$instructions = filter_input(INPUT_POST, 'instructions', FILTER_VALIDATE_FLOAT);
$pass_finite = filter_input(INPUT_POST, 'pass_finite', FILTER_VALIDATE_FLOAT);


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Order Form</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>

<main>
    <h1>Mimo's Pizza Order Form</h1>

    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
    
    <form action="reviewOrder.php" method="post">

        <div id="data_selection">
            <label>Pizza Size:</label><br>
            <input type="radio" name="size" value="small"><span>Small</span><br>
            <input type="radio" name="size" value="medium"><span>Medium</span><br>
            <input type="radio" name="size" value="large"><span>Large</span><br>
            <br>

            <label>Pizzas:</label><br>
            <select  name="pizzas[]" size="4" multiple>
                <option value="margherita">Regina Margherita</option>
                <option value="quatro_stagione">Quatro Stagione</option>
                <option value="calzone">Calzone</option>
                <option value ="siciliano" >Siciliano</option>
                <option value ="del_mare" >Del Mare</option>
            </select>
            <br><br>

            <label>Extra Toppings:</label><br>
            <input type="checkbox" name="toppings[]" value="pep"><span>Pepperoni</span><br>
            <input type="checkbox" name="toppings[]" value="art"><span>Artichoke</span><br>
            <input type="checkbox" name="toppings[]" value="pep"><span>Prociutto</span><br>
            <input type="checkbox" name="toppings[]" value="bel_pep"><span>Bell Pepper</span><br>
            <br>

            <label>Email:</label>            
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <br>
            <label>Password:</label>            
            <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
            <br><br>

            <label>Special Instructions:</label>
            <textarea name="instructions" rows="4" cols="30" value="<?php echo htmlspecialchars($instructions); ?>"></textarea>
            <br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Review Order"><br>
        </div>

    </form>
</main>
<footer>
    &copy; 2017 CIS 424
</footer>
</body>
</html>
