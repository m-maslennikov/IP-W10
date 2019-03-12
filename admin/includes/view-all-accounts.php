<?php deleteAccount(); ?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Email</th>
            <th>Full Name</th>
            <th>DoB</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = 'SELECT * FROM accounts';
    $select_accounts = mysqli_query($connection, $query);
    validateQuery($select_accounts);
    while($row = mysqli_fetch_assoc($select_accounts)) {
        $account_id = $row['account_id'];
        $account_type = $row['account_type'];
        $account_email = $row['account_email'];
        echo "<tr>";
            echo "<td>{$account_id}</td>";
            echo "<td>{$account_type}</td>";
            echo "<td>{$account_email}</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "
                <td>
                    <a href='accounts.php?action=edit&account_id={$account_id}' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                    <a href='accounts.php?delete={$account_id}' class='text-danger px-1'><i class='fas fa-trash'></i></a>
                </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>