<!-- This modal wil pop up if admin/staff clicks on reject booking icon-->
<div class="modal fade" id="rejectBookingModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Reject?</h4>
                <a class="close" data-dismiss="modal" >&times;</a>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="booking_comment">Enter the reason</label>
                        <textarea class="form-control" name="booking_comment" id="booking_comment" required rows="3"></textarea>
                    </div>
                    <input type="hidden" class="reject" name="booking_id" id="booking_id">
                </div>
                <div class="modal-footer">
                    <a href="" class="btn" data-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-delete" name="reject_booking">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>