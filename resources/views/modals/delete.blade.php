<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="" method="POST" class="form">
        @method('delete') @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#deleteModal').on('show.bs.modal', function (event) {
            var modal = $(this);
            var button = $(event.relatedTarget);
            var route = button.data('route');
            var id = button.data('id');
            var subject = button.data('subject');

            modal.find('.form').attr('action', route);
            modal.find('.modal-title').text('Delete #' + id);
            modal.find('.modal-body').text('Are you sure you want to delete ' + subject + '?');
        });
    });

</script>
