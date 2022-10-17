    <button class="btn btn-danger" wire:click="$emit('triggerDelete',2)">
        Delete
    </button>

@once
    @push('scripts')
        <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', contactId => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Conatct record will be deleted!',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Delete!'
            }).then((result) => {
         //if user clicks on delete
                if (result.value) {
             // calling destroy method to delete
                    @this.call('destroy',contactId)
             // success response
                    Swal.fire({title: 'Contact deleted successfully!', icon: 'success'});
                } else {
                    Swal.fire({
                        title: 'Operation Cancelled!',
                        icon: 'success'
                    });
                }
            });
        });
    })
</script>
    @endpush
@endonce

{{--
<<<<<<< HEAD
    https://realrashid.medium.com/how-to-use-sweetalert2-with-livewire-96ea02673b51
=======
    https://realrashid.medium.com/how-to-use-sweetalert2-with-livewire-96ea02673b51 
>>>>>>> ede0df7 (first)
     --}}