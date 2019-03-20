// Select all checkboxes by clicking one in the head of the table
$(document).ready(function () {
    $('#selectAllBoxes').click(function (event) {
        if (this.checked) {
            $('.checkboxes').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkboxes').each(function () {
                this.checked = false;
            });
        }
    });
}); 
// ----------------------------------------------------------


// Delete account confirmation modal show on click "delete" icon
$(document).ready(function () {
    $(".delete-link").on('click', function(){
        var id = $(this).attr("rel");
        var delete_url = "accounts.php?delete="+ id;
        $(".btn-delete").attr("href",delete_url);
        $(".modal-body").text("Are you sure you want to delete account "+ id +"?");
        $("#confirmDeletionModal").modal('show');
    });
});
// ----------------------------------------------------------


// Delete account confirmation modal show on click "delete" icon
$(document).ready(function () {
    $(".reject-link").on('click', function(){
        var id = $(this).attr("rel");
        $(".reject").attr("value",id);
        $("#rejectBookingModal").modal('show');
    });
});
// ----------------------------------------------------------