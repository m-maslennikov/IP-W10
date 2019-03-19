<?php

// ------------------------------------------------------------------
// General helper functions START
// ------------------------------------------------------------------

function clean($string) {
    return htmlentities($string);
}

function redirect($location) {
    return header("Location: {$location}");
}

function setSessionMessage($message){
    if(!empty($message)){
        $_SESSION['message'] = $message;
    } else {
        $message = "";
    }
}

function displaySessionMessage() {
    if (isset($_SESSION['message'])){
        echo "
        <div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
            <strong>Info:</strong><br> {$_SESSION['message']}
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
            </button>
        </div>
        ";

        unset($_SESSION['message']);
    }
}

function generateToken() {
    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    return $token;
}

function displayErrorAlert($alert) {
    echo "
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        <strong>Error:</strong><br> {$alert}
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>";    
}

function displaySuccessAlert($alert) {
    echo "
    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        <strong>Success:</strong><br> {$alert}
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>";    
}

function sendEmail($email, $subject, $msg, $headers) {
    return mail($email, $subject, $msg, $headers);
}

// ------------------------------------------------------------------
// General helper functions END
// ------------------------------------------------------------------
//
// TO DO: WRITE COMMENTS / REFACTOR.
//
// ------------------------------------------------------------------
// ADMIN section functions START
// ------------------------------------------------------------------

// Function for adding new car categories
function insertCategory() {
    if (isset($_POST['add_category'])) {
        $category_name = $_POST['category_name'];
        $category_daily_price = $_POST['category_daily_price'];
        $category_description = $_POST['category_description'];
        if (empty($category_name) && empty($category_daily_price)) {
            displayErrorAlert("Name and Daily Price should not be empty");
        } else {
            $query = "INSERT INTO categories (category_name, category_daily_price, category_description) VALUES ('{$category_name}','{$category_daily_price}','{$category_description}')";
            query($query);
            header("Location: categories.php");
        }
    }
} // EOF

// Function for displaying all categories
function displayAllCategories() {
    // Get All categories from DB
    $query = "SELECT * FROM categories";
    $result = query($query);
    while($row = fetchArray($result)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        $category_daily_price = $row['category_daily_price'];
        $category_description = $row['category_description'];
        echo "<tr>
                <td>{$category_id}</td>
                <td>{$category_name}</td>
                <td>{$category_daily_price}</td>
                <td>{$category_description}</td>
                <td>
                    <a href='categories.php?edit={$category_id}' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                    <a href='categories.php?delete={$category_id}' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                </td>
              </tr>";
    }
} // EOF

// Function for updating car category
function updateCategory($category_id) {
    if (isset($_POST['update_category'])) {
        $category_name = $_POST['category_name'];
        $category_daily_price = $_POST['category_daily_price'];
        $category_description = $_POST['category_description'];
        if (empty($category_name) || empty($category_daily_price)) {
            displayErrorAlert("Name and Daily Price should not be empty");
        } else {
            $query = "UPDATE categories SET 
            category_name = '{$category_name}', 
            category_daily_price = '{$category_daily_price}', 
            category_description = '{$category_description}' 
            WHERE category_id = {$category_id}";
            query($query);
            header("Location: categories.php");
        }
    }
} // EOF

// Function for deleting a car category
function deleteCategory() {
    if (isset($_GET['delete'])) {
        $category_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE category_id = {$category_id}";
        query($query);
        header("Location: categories.php");
    }
} // EOF

// Function for adding a new car
function addCar() {
    if (isset($_POST['add_car'])) {
        $car_make = $_POST['car_make'];
        $car_model = $_POST['car_model'];
        $car_colour = $_POST['car_colour'];
        $car_status = $_POST['car_status'];
        $car_body_type = $_POST['car_body_type'];
        $car_power = $_POST['car_power'];
        $category_id = $_POST['category_id'];
        $car_image = $_FILES['car_image']['name'];
        $car_image_temp = $_FILES['car_image']['tmp_name'];
        $car_doors = $_POST['car_doors'];
        $car_seats = $_POST['car_seats'];
        move_uploaded_file($car_image_temp, "../images/$car_image");
        $query = "INSERT INTO cars (car_make, car_model, car_colour, car_status, car_body_type, car_power, category_id, car_image, car_doors, car_seats) 
                VALUES ('{$car_make}','{$car_model}','{$car_colour}','{$car_status}','{$car_body_type}','{$car_power}','{$category_id}','{$car_image}','{$car_doors}','{$car_seats}')";
        query($query);
        displaySuccessAlert("Car added. <a href='cars.php'>Go to cars</a>");
    }
} // EOF

// Function for updating car details
function updateCar($car_id) {
    global $connection;
    if (isset($_POST['update_car'])) {
        $car_make = $_POST['car_make'];
        $car_model = $_POST['car_model'];
        $car_colour = $_POST['car_colour'];
        $car_status = $_POST['car_status'];
        $car_body_type = $_POST['car_body_type'];
        $car_power = $_POST['car_power'];
        $category_id = $_POST['category_id'];
        $car_image = $_FILES['car_image']['name'];
        $car_image_temp = $_FILES['car_image']['tmp_name'];
        $car_doors = $_POST['car_doors'];
        $car_seats = $_POST['car_seats'];
    
        move_uploaded_file($car_image_temp, "../images/$car_image");
        
        if (empty($car_image)) {
            $query = "SELECT * FROM cars WHERE car_id = $car_id";
            $result = query($query);
            while($row = fetchArray($result)) {
                $car_image = $row['car_image'];
            }
        }
        $query = "UPDATE cars SET 
                car_make = '{$car_make}', 
                car_model = '{$car_model}', 
                car_colour = '{$car_colour}', 
                car_status = '{$car_status}', 
                car_body_type = '{$car_body_type}', 
                car_power = '{$car_power}', 
                category_id = '{$category_id}', 
                car_image = '{$car_image}', 
                car_doors = '{$car_doors}', 
                car_seats = '{$car_seats}' 
                WHERE car_id = {$car_id}";
        query($query);
        header("Location: cars.php");
    }
} // EOF

// Function for deleting a car
function deleteCar() {
    if(isset($_GET['delete'])) {
        $car_id = $_GET['delete'];
        $query = "DELETE FROM cars WHERE car_id = {$car_id}";
        query($query);
        header("Location: cars.php");
    }
} // EOF

// Function for making a car available
function enableCar() {
    if(isset($_GET['enable'])) {
        $car_id = $_GET['enable'];
        $query = "UPDATE cars SET car_status = 'Available' WHERE car_id = $car_id";
        query($query);
        header("Location: cars.php");
    }
} // EOF

// Function for making a car unavailable
function disableCar() {
    if(isset($_GET['disable'])) {
        $car_id = $_GET['disable'];
        $query = "UPDATE cars SET car_status = 'Available' WHERE car_id = $car_id";
        query($query);
        header("Location: cars.php");
    }
} // EOF

// Function for adding an account from admin panel
function addAccount() {
    if (isset($_POST['add_account'])) {
        $account_password = $_POST['account_password'];
        $account_email = $_POST['account_email'];
        $account_type = $_POST['account_type'];
        $query = "INSERT INTO accounts (account_password, account_email, account_type) 
                VALUES ('{$account_password}','{$account_email}','{$account_type}')";
        query($query);
        displaySessionMessage("User created. <a href='accounts.php'>Go to accounts</a>");
        //header("Location: accounts.php");
    }
} // EOF

// Function for editing an account from admin panel
function updateAccount($account_id) {
    if (isset($_POST['update_account'])) {
        $account_password = $_POST['account_password'];
        $account_password = password_hash($account_password, PASSWORD_BCRYPT, array('cost' => 12));
        $account_email = $_POST['account_email'];
        $account_type = $_POST['account_type'];
        $account_status = $_POST['account_status'];
        $account_first_name = $_POST['account_first_name'];
        $account_last_name = $_POST['account_last_name'];
        $account_dob = $_POST['account_dob'];
        $account_address = $_POST['account_address'];
        $account_phone = $_POST['account_phone'];
        if (empty($account_password)) {
            $query = "SELECT * FROM accounts WHERE account_id = $account_id";
            $result = query($query);
            while($row = fetchArray($result)) {
                $account_password = $row['account_password'];
            }
        }
        $query = "UPDATE accounts SET 
                account_password = '{$account_password}', 
                account_email = '{$account_email}', 
                account_type = '{$account_type}',
                account_status = '{$account_status}',
                account_first_name = '{$account_first_name}',
                account_last_name = '{$account_last_name}',
                account_dob = '{$account_dob}',
                account_address = '{$account_address}',
                account_phone = '{$account_phone}'
                WHERE account_id = {$account_id}";
        query($query);
        header("Location: accounts.php");
    }
} // EOF

// Function for deleting an account from admin panel
function deleteAccount() {
    if(isset($_GET['delete'])) {
        $account_id = $_GET['delete'];
        $query = "DELETE FROM accounts WHERE account_id = {$account_id}";
        query($query);
        header("Location: accounts.php");
    }
} // EOF

// Function for enabling an account from admin panel
function enableAccount() {
    if(isset($_GET['enable'])) {
        $account_id = $_GET['enable'];
        $query = "UPDATE accounts SET account_status = 'Enabled' WHERE account_id = $account_id";
        query($query);
        header("Location: accounts.php");
    }
} // EOF

// Function for disabling an account from admin panel
function disableAccount() {
    if(isset($_GET['disable'])) {
        $account_id = $_GET['disable'];
        $query = "UPDATE accounts SET account_status = 'Disabled' WHERE account_id = $account_id";
        query($query);
        header("Location: accounts.php");
    }
} // EOF

// Function for accepting a booking request from admin panel
function acceptBooking() {
    if(isset($_GET['accept'])) {
        $booking_id = $_GET['accept'];
        $query = "UPDATE bookings SET booking_status = 'Accepted' WHERE booking_id = $booking_id";
        query($query);
        header("Location: bookings.php");
    }
} // EOF

// Function for rejecting a booking request from admin panel
function rejectBooking() {
    if(isset($_GET['reject'])) {
        $booking_id = $_GET['reject'];
        $query = "UPDATE bookings SET booking_status = 'Rejected' WHERE booking_id = $booking_id";
        query($query);
        header("Location: bookings.php");
    }
} // EOF

// ------------------------------------------------------------------
// ADMIN section functions END
// ------------------------------------------------------------------
//
//
//
// ------------------------------------------------------------------
// USER section functions START
// ------------------------------------------------------------------

// Function for updating user profile
function updateProfile() {
    if (isset($_POST['update_profile'])) {
        $account_email = $_POST['account_email'];
        $account_first_name = $_POST['account_first_name'];
        $account_last_name = $_POST['account_last_name'];
        $account_phone = $_POST['account_phone'];
        $account_address = $_POST['account_address'];
        $account_dob = $_POST['account_dob'];
        $account_id = $_SESSION['account_id'];
        $query = "UPDATE accounts SET 
                account_email = '{$account_email}',
                account_first_name = '{$account_first_name}',
                account_last_name = '{$account_last_name}',
                account_phone = '{$account_phone}',
                account_address = '{$account_address}',
                account_dob = '{$account_dob}'
                WHERE account_id = {$account_id}";
        query($query);
        $_SESSION['account_email'] = $account_email;
    }
} // EOF

// Function for updating user password
function updatePassword($account_id, $password){
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    $query = "UPDATE accounts SET account_password = '$password' WHERE account_id = '$account_id'";
    $result = query($query);
    validateQuery($result);
    displaySuccessAlert("Password has been updated.");
} // EOF

// Function for validating user password before updating
function validateUserPassword(){
    if(isset($_POST['update_password'])){
        $account_id                         = $_SESSION['account_id'];
        $account_password                   = clean($_POST['account_password']);
        $new_account_password               = clean($_POST['new_account_password']);
        $new_account_password_confirmation  = clean($_POST['new_account_password_confirmation']);

        if(!empty($account_password) && !empty($new_account_password) && !empty($new_account_password_confirmation)){
            // go verify current password
            $query = "SELECT account_password FROM accounts WHERE account_id = '$account_id'";
            $result = query($query);
            validateQuery($result);
            if(rowCount($result) == 1) {
                $row = fetchArray($result);
                $db_account_password = $row['account_password'];
                if(password_verify($account_password, $db_account_password)){
                    // go check new passwords
                    if($new_account_password !== $new_account_password_confirmation){
                        displayErrorAlert("New passwords don't match");
                    } else {
                        // if everything is validated - update password
                        updatePassword($account_id, $new_account_password);
                    }
                } else {
                    displayErrorAlert("Wrong current password.");
                }
            }
        } else {
            displayErrorAlert("Passwords should not be empty.");
        }
    }
} // EOF

// ------------------------------------------------------------------
// USER section functions END
// ------------------------------------------------------------------
//
//
//
// ------------------------------------------------------------------
// Login and Registration System functions START
// ------------------------------------------------------------------

// Check if email already registered
function emailExists($email) {
    $email = escape($email);
    $query = "SELECT account_id FROM accounts WHERE account_email = '$email'";
    $result = query($query);
    if(rowCount($result) == 1){
        return true;
    } else {
        return false;
    }
}

// Register user
function registerUser($account_first_name, $account_last_name, $account_email, $account_password) {
    $account_first_name     = escape($account_first_name);
    $account_last_name      = escape($account_last_name);
    $account_email          = escape($account_email);
    $account_password       = escape($account_password);

    if(emailExists($account_email)){
        return false;
    } else {
        $account_password = password_hash($account_password, PASSWORD_BCRYPT, array('cost' => 12));
        $account_validation_code = md5($account_email . microtime());
        $query = "INSERT INTO accounts (account_first_name, account_last_name, account_email, account_password, account_status, account_validation_code) VALUES ('{$account_first_name}','{$account_last_name}','{$account_email}','{$account_password}','disabled','{$account_validation_code}')";
        query($query);
        validateQuery($query);

        $subject = "Activate Account";
        $message = "Please click the following link to activate account: 
        http://localhost/ip-w10/activate.php?email=$account_email&code=$account_validation_code";
        $headers = "From: noreply@rentacar.com";

        sendEmail($email, $subject, $message, $headers);

        return true;
    }
}

// Validate all user input in Register form
function validateUserReg(){
    $min = 2;
    $max = 255;
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $account_first_name             = clean($_POST['account_first_name']);
        $account_last_name              = clean($_POST['account_last_name']);
        $account_email                  = clean($_POST['account_email']);
        $account_password               = clean($_POST['account_password']);
        $account_password_confirmation  = clean($_POST['account_password_confirmation']);

        if(strlen($account_first_name) < $min || strlen($account_first_name) > $max){
            $errors[] = "First name must be between 2 and 255 characters";
        }
    
        if(strlen($account_last_name) < $min || strlen($account_first_name) > $max){
            $errors[] = "Last name must be between 2 and 255 characters";
        }
    
        if($account_password !== $account_password_confirmation){
            $errors[] = "Passwords don't match";
        }
    
        if(emailExists($account_email)){
            $errors[] = "$account_email is alredy registered";
        }
    
        if(!empty($errors)){
            foreach ($errors as $error) {
                displayErrorAlert($error);
            }
        } else {
            if(registerUser($account_first_name, $account_last_name, $account_email, $account_password)){
                setSessionMessage("You have registered. Please check your email and activate your account.");
                redirect("login.php");
            }
        }
    }
}

// Activate User Account
function activateAccount() {
    if($_SERVER['REQUEST_METHOD'] == "GET") {
        if(isset($_GET['email'])) {
            $account_email = escape(clean($_GET['email']));
            $account_validation_code = escape(clean($_GET['code']));
            $query = "SELECT account_id FROM accounts WHERE account_email = '$account_email' AND account_validation_code = '$account_validation_code'";
            $result = query($query);
            validateQuery($result);
            if(rowCount($result) == 1) {
                $query = "UPDATE accounts SET account_status = 'enabled', account_validation_code = '0' WHERE account_email = '$account_email' AND account_validation_code = '$account_validation_code'";
                $result = query($query);
                validateQuery($result);
                setSessionMessage("Your account has been activated. You can log in.");
                redirect("login.php");
            } else {
                setSessionMessage("Your account could not be activated.");
                redirect("login.php");
            }
        }
    }
}

// Login user
function loginUser($email, $password) {
    $query = "SELECT account_id, account_email, account_password, account_type FROM accounts WHERE account_email = '$email' AND account_status = 'enabled'";
    $result = query($query);
    validateQuery($result);
    if(rowCount($result) == 1) {
        $row = fetchArray($result);
        $account_id = $row['account_id'];
        $account_email = $row['account_email'];
        $account_password = $row['account_password'];
        $account_type = $row['account_type'];
        if(password_verify($password, $account_password)){
            if($remember_me == "on"){
                setcookie('id', $account_id, time() + 3600);
            }
            $_SESSION['account_email'] = $account_email;
            $_SESSION['account_type'] = $account_type;
            $_SESSION['account_id'] = $account_id;
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Check if user is logged in
function loggedIn(){
    if(isset($_SESSION['account_id'])){
        return true;
    } else {
        return false;
    }
}

// Validate Login form
function validateUserLogin(){
    $secret_key = '6LcZx5cUAAAAAFnhHQgi7FQkr97oz1QiZ2BOPyqp'; // Google reCaptcha secret key
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        if(!empty($_POST['g-recaptcha-response'])){
            // Request the Google server to validate captcha
            $request = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
            // The result is in a JSON format. Decoding.
            $response = json_decode($request);
            // If Captcha is ok - go check credentials and login
            if($response->success){
                $account_email      = escape(clean($_POST['account_email']));
                $account_password   = escape(clean($_POST['account_password']));

                if(empty($account_email)) {
                    $errors[] = "Email field can not be empty";
                }

                if(empty($account_password)) {
                    $errors[] = "Password field can not be empty";
                }

                if(!empty($errors)){
                    foreach ($errors as $error) {
                        displayErrorAlert($error);
                    }
                } else {
                    if(loginUser($account_email, $account_password)){
                        redirect("admin");
                    } else {
                        displayErrorAlert("We can not log you in. <br> Possible causes: <br> 1. Incorrect credetials <br> 2. Account is not activated");
                    }
                }
            }
        } else {
            displayErrorAlert("Are you a robot?");
            //$errors[] = "Are you a robot?";
        }
    }
}

// Forgoten password recover
function recoverPassword(){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']){
            $account_email = escape($_POST['account_email']);
            if(emailExists($account_email)){
                $account_validation_code = md5($account_email . microtime());
                setcookie('temp_access_code', $account_validation_code, time() + 1800);
                $query = "UPDATE accounts SET account_validation_code = '$account_validation_code' WHERE account_email = '$account_email'";
                $result = query($query);
                validateQuery($result);
                $subject = "Recover Password";
                $message = "Your validation code is: $account_validation_code
                Click the following link to reset your password: 
                http://localhost/ip-w10/code.php?email=$account_email&code=$account_validation_code";
                $headers = "From: noreply@rentacar.com";
                //sendEmail($account_email, $subject, $message, $headers);
                displaySuccessAlert("Your validation code is: $account_validation_code
                Click the following link to reset your password: 
                http://localhost/ip-w10/code.php?email=$account_email&code=$account_validation_code");
            } else {
                displayErrorAlert("This email is not registered");
            }
        } else {
            displayErrorAlert("Something went wrong. Please try again.");
        }
    }
}

// Validate Reset password code
function validateCode(){
    if(isset($_COOKIE['temp_access_code'])){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(!isset($_GET['email']) && !isset($_GET['code'])){
                displayErrorAlert("[NOT SET] Wrong link. Ensure you copied emailed link correctly");
            } elseif(empty($_GET['email']) && empty($_GET['code'])){
                displayErrorAlert("[EMPTY] Wrong link. Ensure you copied emailed link correctly");
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($_POST['account_validation_code'])){
                $account_validation_code = escape(clean($_POST['account_validation_code']));
                $account_email = escape(clean($_GET['email']));
                $query = "SELECT account_id FROM accounts WHERE account_validation_code = '$account_validation_code' AND account_email = '$account_email'";
                $result = query($query);
                validateQuery($result);
                if(rowCount($result) == 1){
                    setcookie('temp_access_code', $account_validation_code, time() + 300);
                    setSessionMessage("Validation code is accepted. Set a new password.");
                    redirect("reset.php?email=$account_email&code=$account_validation_code");
                } else {
                    displayErrorAlert("Wrong validation code. Try again.");
                }
            }
        }
    } else {
        setSessionMessage("Your validation code is expired. Try again.");
        redirect('forgot-password.php');
    }
}

// Password reset funtion
function resetPassword(){
    if(isset($_COOKIE['temp_access_code'])){
        if(isset($_GET['email']) && isset($_GET['code'])){
            if(isset($_SESSION['token']) && isset($_POST['token'])) {
                if($_POST['token'] === $_SESSION['token']){
                    $account_password = escape(clean($_POST['account_password']));
                    $account_password_confirmation = escape(clean($_POST['account_password_confirmation']));
                    $account_email = escape(clean($_GET['email']));
                    if($account_password === $account_password_confirmation){
                        $account_password = password_hash($account_password, PASSWORD_BCRYPT, array('cost' => 12));
                        $query = "UPDATE accounts SET account_password = '$account_password', account_validation_code = '0' WHERE account_email = '$account_email'";
                        $result = query($query);
                        validateQuery($result);
                        setSessionMessage("Password was successfully updated. You can log in.");
                        unset($_COOKIE['temp_access_code']);
                        setcookie('temp_access_code', '', time() - 300);
                        redirect("login.php");
                    }
                }
            }
        }
    } else {
        setSessionMessage("Your validation code is expired. Try again.");
        redirect('forgot-password.php');
    }
}

// ------------------------------------------------------------------
// Login and Registration System functions START
// ------------------------------------------------------------------

?>