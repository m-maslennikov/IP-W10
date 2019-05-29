<?php deleteAccount(); ?>
<?php enableAccount(); ?>
<?php disableAccount(); ?>
<?php include "includes/_admin-delete-modal.php"; ?>
<?php bulkAccountAction(); ?>

<!-- This is a part for displaying All Accounts table -->
<form action="" method="post">
    <div class="row justify-content-start">
        <div class="col-lg-4">
            <div class="form-group">
                <select class="form-control" name="bulk_action">
                    <option value="">Select Options</option>
                    <option value="enable">Enable</option>
                    <option value="disable">Disable</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="" value="Apply">
                <a class="btn btn-primary" href="accounts.php?action=add" role="button">Add...</a>
            </div>
        </div>
        <div class="col-lg-5">
            <small>
            <p><span class="text-success px-1"><i class='fas fa-check'></i></span>- Enable
            <span class="text-warning px-1"><i class='fas fa-ban'></i></span>- Disable
            <span class="text-dark px-1"><i class='fas fa-pencil-alt'></i></span>- Edit
            <span class="text-danger px-1"><i class='fas fa-trash'></i></span>- Delete</p>
            </small>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="bulk_option" id="selectAllBoxes"></th>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php // PAGINATION. It appears only on accounts page. Can be converted to a common function but it's better to use Laravel.
                $items_per_page = 10;
                $query = 'SELECT * FROM accounts';
                $select_accounts = mysqli_query($connection, $query);
                $acoounts_count = mysqli_num_rows($select_accounts);
                $acoounts_count = ceil($acoounts_count / $items_per_page);

                if(isset($_GET['page'])){
                    $current_page = $_GET['page'];
                    $page = $_GET['page'];
                } else {
                    $page = "";
                    $current_page = "";
                }

                if($page == "" || $page == 1){
                    $current_page = 1;
                    $page = 0;
                } else {
                    $page = ($page * $items_per_page) - $items_per_page;
                }
                
                $query = "SELECT * FROM accounts LIMIT $page, $items_per_page";
                $select_accounts = mysqli_query($connection, $query);
                validateQuery($select_accounts);
                while($row = mysqli_fetch_assoc($select_accounts)) {
                    $account_id = $row['account_id'];
                    $account_type = $row['account_type'];
                    $account_status = $row['account_status'];
                    $account_email = $row['account_email'];
                    $account_first_name = $row['account_first_name'];
                    $account_last_name = $row['account_last_name'];
                    echo "<tr>";
                    ?>

                    <td><input class="checkboxes" type="checkbox" name="accountsCheckboxArray[]" value="<?php echo $account_id; ?>" id="selectAllBoxes"></td>

                    <?php
                        echo "<td>{$account_id}</td>";
                        echo "<td>{$account_email}</td>";
                        echo "<td>{$account_first_name} {$account_last_name}</td>";
                        echo "<td>{$account_status}</td>";
                        echo "<td>{$account_type}</td>";
                        echo "
                            <td>
                                <a href='accounts.php?enable={$account_id}' class='text-success px-1'><i class='fas fa-check'></i></a>
                                <a href='accounts.php?disable={$account_id}' class='text-warning px-1'><i class='fas fa-ban'></i></a>
                                <a href='accounts.php?action=edit&account_id={$account_id}' class='text-dark px-1'><i class='fas fa-pencil-alt'></i></a>
                                <a href='javascript:void(0);' rel='$account_id' class='text-danger px-1 delete-link'><i class='fas fa-trash'></i></a>
                            </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <nav>
                <ul class="pagination">
                    <?php
                    for($i = 1; $i <= $acoounts_count; $i++){
                        if($i == $current_page){
                            echo "<li class='page-item active'><a class='page-link' href='accounts.php?page=$i'>$i</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='accounts.php?page=$i'>$i</a></li>";
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</form>