<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" wire:ignore>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Edit Appointment</h4>
                Title:
                <input type="text" class="form-control" wire:model="form_data.title">
                Start time:
                <br />
                <input type="text" class="form-control" wire:model="form_data.start">

                End time:
                <br />
                <input type="text" class="form-control" wire:model="form_data.end">
            </div>

            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
