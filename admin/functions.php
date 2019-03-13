<?php

function validateQuery($result) {
    global $connection;
    if(!$result) {
        die("QUERY FAILED. " . mysqli_error($connection));
    }
}

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
        $account_email = $_POST['account_email'];
        $account_type = $_POST['account_type'];
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
                account_type = '{$account_type}' 
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

?>