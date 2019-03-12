<?php deleteCar(); ?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Car ID</th>
            <th>Make and Model</th>
            <th>Colour</th>
            <th>Status</th>
            <th>Body Type</th>
            <th>Power</th>
            <th>Category</th>
            <th>Image</th>
            <th>Doors</th>
            <th>Seats</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = 'SELECT * FROM cars';
    $select_cars = mysqli_query($connection, $query);
    validateQuery($select_cars);
    while($row = mysqli_fetch_assoc($select_cars)) {
        $car_id = $row['car_id'];
        $car_make = $row['car_make'];
        $car_model = $row['car_model'];
        $car_colour = $row['car_colour'];
        $car_status = $row['car_status'];
        $car_body_type = $row['car_body_type'];
        $car_power = $row['car_power'];
        $category_id = $row['category_id'];
        $car_image = $row['car_image'];
        $car_doors = $row['car_doors'];
        $car_seats = $row['car_seats'];
        echo "<tr>";
            echo "<td>{$car_id}</td>";
            echo "<td>{$car_make} {$car_model}</td>";
            echo "<td>{$car_colour}</td>";
            echo "<td>{$car_status}</td>";
            echo "<td>{$car_body_type}</td>";
            echo "<td>{$car_power}</td>";
                $query = "SELECT * FROM categories WHERE category_id = {$category_id}";
                $select_category_id = mysqli_query($connection, $query);
                validateQuery($select_category_id);
                while($row = mysqli_fetch_assoc($select_category_id)) {
                    $category_name = $row['category_name'];
                    echo "<td>{$category_name}</td>";
                }
            echo "<td><img width='100px' src='../images/$car_image' alt='$car_image'></td>";
            echo "<td>{$car_doors}</td>";
            echo "<td>{$car_seats}</td>";
            echo "
                <td>
                    <a href='cars.php?action=edit&car_id={$car_id}' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                    <a href='cars.php?delete={$car_id}' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>