<?php

function login() {
    global $connection;
    if (isset($_POST['login'])) {
        $filled_account_email = mysqli_real_escape_string($connection, $_POST['account_email']);
        $filled_account_password = mysqli_real_escape_string($connection, $_POST['account_password']);
        $query = "SELECT * FROM accounts WHERE account_email='$filled_account_email' AND account_password='$filled_account_password'";
        $select_account_query = mysqli_query($connection, $query);
        validateQuery($select_account_query);

        while($row = mysqli_fetch_assoc($select_account_query)) {
            $account_email = $row['account_email'];
            $account_password = $row['account_password'];
            $account_type = $row['account_type'];
        }

        if ($filled_account_email === $account_email && $filled_account_password === $account_password) {
            $_SESSION['account_email'] = $account_email;
            $_SESSION['account_type'] = $account_type;
            header('location: ../admin');
        } else {
            header('location: login.php');
        }
    }
}

function register() {
    global $connection;
    if (isset($_POST['register_account'])) {
        $account_email = $_POST['account_email'];
        $account_password = $_POST['account_password'];
        $account_password_confirmation = $_POST['account_password_confirmation'];
        $query = "INSERT INTO accounts (account_email, account_password) 
                VALUES ('{$account_email}','{$account_password}')";
        $register_account_query = mysqli_query($connection, $query);
        validateQuery($register_account_query);
        header("Location: ../index.php");
    }
}

?>