<?php

function login() {
    global $connection;
    $secret_key = '6LcZx5cUAAAAAFnhHQgi7FQkr97oz1QiZ2BOPyqp'; // Google reCaptcha secret key
    if (isset($_POST['login'])) {
        if(!empty($_POST['g-recaptcha-response'])){
            // Request the Google server to validate captcha
            $request = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
            // The result is in a JSON format. Decoding.
            $response = json_decode($request);
            // If Captcha is ok - go check credentials and login
            if($response->success){
                $filled_account_email = mysqli_real_escape_string($connection, $_POST['account_email']);
                $filled_account_password = mysqli_real_escape_string($connection, $_POST['account_password']);
                $query = "SELECT * FROM accounts WHERE account_email='$filled_account_email'";
                $select_account_query = mysqli_query($connection, $query);
                validateQuery($select_account_query);

                while($row = mysqli_fetch_assoc($select_account_query)) {
                    $account_id = $row['account_id'];
                    $account_email = $row['account_email'];
                    $account_password = $row['account_password'];
                    $account_type = $row['account_type'];
                    $account_status = $row['account_status'];
                }

                // Credentials validation
                if (password_verify($filled_account_password, $account_password) && $account_status === 'enabled') {
                    $_SESSION['account_email'] = $account_email;
                    $_SESSION['account_type'] = $account_type;
                    $_SESSION['account_id'] = $account_id;
                    if ($account_type == 'customer'){
                        header('location: ../');
                    } else {
                        header('location: ../admin');
                    }
                } else {
                    echo "<h4 class='text-center'>Something went wrong <br> Please try again</h4>";
                    //header('location: login.php');
                }
            } 
        } else {
            echo "<h4 class='text-center'>Are you a robot?</h4>";
        }
    }
}


function register() {
    global $connection;
    if (isset($_POST['register_account'])) {
        $account_email = mysqli_real_escape_string($connection, $_POST['account_email']);
        $account_password = mysqli_real_escape_string($connection, $_POST['account_password']);
        $account_password_confirmation = mysqli_real_escape_string($connection, $_POST['account_password_confirmation']);

        $account_password = password_hash($account_password, PASSWORD_BCRYPT, array('cost' => 12));

        $query = "INSERT INTO accounts (account_email, account_password) 
                VALUES ('{$account_email}','{$account_password}')";
        $register_account_query = mysqli_query($connection, $query);
        validateQuery($register_account_query);
        header("Location: ../index.php");
    }
}

?>