<?php
    // get the data from the form
    $investment = filter_input(INPUT_POST, 'investment',
        FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate',
        FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years',
        FILTER_VALIDATE_INT);
    $compounding = filter_input(INPUT_POST, 'compounding',
        FILTER_VALIDATE_INT);

    // validate investment
    if ($investment === FALSE ) {
        $error_message = 'Investment must be a valid number.'; 
    } else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.'; 
    // validate interest rate
    } else if ( $interest_rate === FALSE )  {
        $error_message = 'Interest rate must be a valid number.'; 
    } else if ( $interest_rate <= 0 ) {
        $error_message = 'Interest rate must be greater than zero.'; 
    // validate years
    } else if ( $years === FALSE ) {
        $error_message = 'Years must be a valid whole number.';
    } else if ( $years <= 0 ) {
        $error_message = 'Years must be greater than zero.';
    } else if ( $years > 30 ) {
        $error_message = 'Years must be less than 31.';
    // validate compounding
    } else if ($compounding === FALSE || ($compounding != 1 && $compounding != 2 && $compounding != 12)) {
        $error_message = 'Compounding Option must be valid';
        
    // set error message to empty string if no invalid entries
    } else {
        $error_message = ''; 
    }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit(); 
    }
    
    $periodRate = $interest_rate * .01 / $compounding;
    $investmentPeriods = $years * $compounding;

    // calculate the future value
    $future_value = $investment;
    for ($i = 1; $i <= $investmentPeriods; $i++) {
        $future_value = 
            $future_value + ($future_value * $periodRate); 
    }

    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
    $compounding_f = 'Annual';
    if ($compounding === 2) {
        $compounding_f = 'Semiannual';
    }
    else if ($compounding === 12) {
        $compounding_f = 'Monthly';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>
        
        <label>Compounding Option:</label>
        <span><?php echo $compounding_f; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
        
        <form action ="index.php" method="post">
            <input type="hidden" name ="investment"
                   value="<?php echo $investment; ?>">
            <input type="hidden" name ="interest_rate"
                   value="<?php echo $interest_rate; ?>">
            <input type="hidden" name ="years"
                   value="<?php echo $years; ?>">
            <input type="hidden" name ="compounding"
                   value="<?php echo $compounding; ?>">
            
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Recalculate"><br>
            </div>
        </form>
    </main>
</body>
</html>
