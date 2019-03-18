<?php

// ------------------------------------------------------------------
// General helper functions
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
        echo $_SESSION['message'];
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

// ------------------------------------------------------------------
// ------------------------------------------------------------------


// TO DO: WRITE COMMENTS / REFACTOR.

function insertCategory() {
    global $connection;
    if (isset($_POST['add_category'])) {
        $category_name = $_POST['category_name'];
        $category_daily_price = $_POST['category_daily_price'];
        $category_description = $_POST['category_description'];
        if (empty($category_name) || empty($category_daily_price)) {
            echo "Name and Daily Price should not be empty";
        } else {
            $query = "INSERT INTO categories (category_name, category_daily_price, category_description) 
                    VALUES ('{$category_name}','{$category_daily_price}','{$category_description}')";
            $insert_category_query = mysqli_query($connection, $query);
            validateQuery($insert_category_query);
            header("Location: categories.php");
        }
    }
}

function displayAllCategories() {
    global $connection;
    $query = 'SELECT * FROM categories';
    $select_categories = mysqli_query($connection, $query);
    validateQuery($select_categories);
    while($row = mysqli_fetch_assoc($select_categories)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        $category_daily_price = $row['category_daily_price'];
        $category_description = $row['category_description'];
        echo "<tr>";
        echo "<td>{$category_id}</td>";
        echo "<td>{$category_name}</td>";
        echo "<td>{$category_daily_price}</td>";
        echo "<td>{$category_description}</td>";
        echo "
            <td>
                <a href='categories.php?edit={$category_id}' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                <a href='categories.php?delete={$category_id}' class='text-danger px-1'><i class='fas fa-trash'></i></a>
            </td>";
        echo "</tr>";
    }
}

function updateCategory($category_id) {
    global $connection;
    if (isset($_POST['update_category'])) {
        $category_name = $_POST['category_name'];
        $category_daily_price = $_POST['category_daily_price'];
        $category_description = $_POST['category_description'];
        if (empty($category_name) || empty($category_daily_price)) {
            echo "Name and Daily Price should not be empty";
        } else {
            $query = "UPDATE categories SET 
            category_name = '{$category_name}', 
            category_daily_price = '{$category_daily_price}', 
            category_description = '{$category_description}' 
            WHERE category_id = {$category_id}";
            $update_category_query = mysqli_query($connection, $query);
            validateQuery($update_category_query);
            header("Location: categories.php");
        }
    }
}

function deleteCategory() {
    global $connection;
    if (isset($_GET['delete'])) {
        $category_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE category_id = {$category_id}";
        $delete_category_query = mysqli_query($connection, $query);
        validateQuery($delete_category_query);
        header("Location: categories.php");
    }
}

function addCar() {
    global $connection;
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
        $add_car_query = mysqli_query($connection, $query);
        validateQuery($add_car_query);
        echo "Car added. <a href='cars.php'>Go to cars</a>";
        //header("Location: cars.php");
    }
}

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
            $select_car_image_query = mysqli_query($connection, $query);
            validateQuery($select_car_image_query);
            while($row = mysqli_fetch_assoc($select_car_image_query)) {
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
        $update_car_query = mysqli_query($connection, $query);
        validateQuery($update_car_query);
        header("Location: cars.php");
    }
}

function deleteCar() {
    global $connection;
    if(isset($_GET['delete'])) {
        global $connection;
        $car_id = $_GET['delete'];
        $query = "DELETE FROM cars WHERE car_id = {$car_id}";
        $delete_car_query = mysqli_query($connection, $query);
        validateQuery($delete_car_query);
        header("Location: cars.php");
    }
}

function enableCar() {
    global $connection;
    if(isset($_GET['enable'])) {
        global $connection;
        $car_id = $_GET['enable'];
        $query = "UPDATE cars SET car_status = 'Available' WHERE car_id = $car_id";
        $make_enable_query = mysqli_query($connection,$query);
        validateQuery($make_enable_query);
        header("Location: cars.php");
    }
}

function disableCar() {
    global $connection;
    if(isset($_GET['disable'])) {
        global $connection;
        $car_id = $_GET['disable'];
        $query = "UPDATE cars SET car_status = 'Available' WHERE car_id = $car_id";
        $make_disable_query = mysqli_query($connection,$query);
        validateQuery($make_disable_query);
        header("Location: cars.php");
    }
}

function addAccount() {
    global $connection;
    if (isset($_POST['add_account'])) {
        $account_password = $_POST['account_password'];
        $account_email = $_POST['account_email'];
        $account_type = $_POST['account_type'];
        $query = "INSERT INTO accounts (account_password, account_email, account_type) 
                VALUES ('{$account_password}','{$account_email}','{$account_type}')";
        $add_account_query = mysqli_query($connection, $query);
        validateQuery($add_account_query);
        echo "User created. <a href='accounts.php'>Go to accounts</a>";
        //header("Location: accounts.php");
    }
}

function updateAccount($account_id) {
    global $connection;
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
            $select_account_password_query = mysqli_query($connection, $query);
            validateQuery($select_account_password_query);
            while($row = mysqli_fetch_assoc($select_account_password_query)) {
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
        $update_account_query = mysqli_query($connection, $query);
        validateQuery($update_account_query);
        header("Location: accounts.php");
    }
}

function deleteAccount() {
    global $connection;
    if(isset($_GET['delete'])) {
        global $connection;
        $account_id = $_GET['delete'];
        $query = "DELETE FROM accounts WHERE account_id = {$account_id}";
        $delete_account_query = mysqli_query($connection, $query);
        validateQuery($delete_account_query);
        header("Location: accounts.php");
    }
}

function enableAccount() {
    global $connection;
    if(isset($_GET['enable'])) {
        global $connection;
        $account_id = $_GET['enable'];
        $query = "UPDATE accounts SET account_status = 'Enabled' WHERE account_id = $account_id";
        $make_enable_query = mysqli_query($connection,$query);
        validateQuery($make_enable_query);
        header("Location: accounts.php");
    }
}

function disableAccount() {
    global $connection;
    if(isset($_GET['disable'])) {
        global $connection;
        $account_id = $_GET['disable'];
        $query = "UPDATE accounts SET account_status = 'Disabled' WHERE account_id = $account_id";
        $make_disable_query = mysqli_query($connection,$query);
        validateQuery($make_disable_query);
        header("Location: accounts.php");
    }
}

function acceptBooking() {
    global $connection;
    if(isset($_GET['accept'])) {
        global $connection;
        $booking_id = $_GET['accept'];
        $query = "UPDATE bookings SET booking_status = 'Accepted' WHERE booking_id = $booking_id";
        $make_accept_query = mysqli_query($connection,$query);
        validateQuery($make_accept_query);
        header("Location: bookings.php");
    }
}

function rejectBooking() {
    global $connection;
    if(isset($_GET['reject'])) {
        global $connection;
        $booking_id = $_GET['reject'];
        $query = "UPDATE bookings SET booking_status = 'Rejected' WHERE booking_id = $booking_id";
        $make_reject_query = mysqli_query($connection,$query);
        validateQuery($make_reject_query);
        header("Location: bookings.php");
    }
}

function updateProfile() {
    global $connection;
    if (isset($_POST['update_profile'])) {
        $account_password = $_POST['account_password'];
        $account_password = password_hash($account_password, PASSWORD_BCRYPT, array('cost' => 12));
        $account_email = $_POST['account_email'];
        $account_first_name = $_POST['account_first_name'];
        $account_last_name = $_POST['account_last_name'];
        $account_phone = $_POST['account_phone'];
        $account_address = $_POST['account_address'];
        $account_dob = $_POST['account_dob'];
        $account_id = $_SESSION['account_id'];
        
        if (empty($account_password)) {
            $query = "SELECT * FROM accounts WHERE account_id = $account_id";
            $select_account_query = mysqli_query($connection, $query);
            validateQuery($select_account_query);
            while($row = mysqli_fetch_assoc($select_account_query)) {
                $account_password = $row['account_password'];
            }
        }
        $query = "UPDATE accounts SET 
                account_password = '{$account_password}', 
                account_email = '{$account_email}',
                account_first_name = '{$account_first_name}',
                account_last_name = '{$account_last_name}',
                account_phone = '{$account_phone}',
                account_address = '{$account_address}',
                account_dob = '{$account_dob}'
                WHERE account_id = {$account_id}";
        $update_profile_query = mysqli_query($connection, $query);
        validateQuery($update_profile_query);
        $_SESSION['account_email'] = $account_email;
        //header("Location: profile.php");
        echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                Your profile has been updated.
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>";
    }
}

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
                        header('location: index.php');
                    } else {
                        header('location: admin');
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

// ------------------------------------------------------------------
// Registration functions
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
                displaySuccessAlert("You are registered");
            }
        }
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
        $query = "INSERT INTO accounts (account_first_name, account_last_name, account_email, account_password, account_status) VALUES ('{$account_first_name}','{$account_last_name}','{$account_email}','{$account_password}','disabled')";
        query($query);
        validateQuery($query);
        return true;
    }
}

/*
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
*/

?>