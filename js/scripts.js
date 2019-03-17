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

$(document).ready(function () {
  $(".delete-link").on('click', function(){
    var id = $(this).attr("rel");
    var delete_url = "accounts.php?delete="+ id;
    $(".btn-delete").attr("href",delete_url);
    $(".modal-body").text("Are you sure you want to delete account "+ id +"?");
    $("#confirmDeletionModal").modal('show');

  });
});

/* Generic Confirm func 
function confirm(heading, question, cancelButtonTxt, okButtonTxt, callback) {

    var confirmModal = 
      $('<div class="modal fade">' +        
          '<div class="modal-dialog">' +
          '<div class="modal-content">' +
          '<div class="modal-header">' +
          '<h3>' + heading +'</h3>' +
            '<a class="close" data-dismiss="modal" >&times;</a>' +
          '</div>' +

          '<div class="modal-body">' +
            '<p>' + question + '</p>' +
          '</div>' +

          '<div class="modal-footer">' +
            '<a href="#!" class="btn" data-dismiss="modal">' + 
              cancelButtonTxt + 
            '</a>' +
            '<a href="#!" id="okButton" class="btn btn-primary">' + 
              okButtonTxt + 
            '</a>' +
          '</div>' +
          '</div>' +
          '</div>' +
        '</div>');

    confirmModal.find('#okButton').click(function(event) {
      callback();
      confirmModal.modal('hide');
    }); 

    confirmModal.modal('show');    
  };  
/* END Generic Confirm func */