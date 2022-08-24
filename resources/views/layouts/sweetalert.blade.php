<script type="text/javascript">
    $('.delete').click(function(e) {        
        id = e.target.dataset.id;
        swal({
            title: "Anda Yakin?",
            text: "Data yang akan dihapus tidak dapat dipulihkan kembali",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-primary",
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
            dangerMode: true,
            closeOnCancel: true,
            })
            .then((willDelete) => {
                if (willDelete.value) {     
                    $(`#delete${id}`).submit();
                } else if (willDelete.dismiss) {                    
                    swal("Batal", "Data anda tetap aman", "success");                          
                }
        });
    });

    function successAlert(message) {
        swal({
            title: "Sukses",
            text: message,
            type: "success",
            confirmButtonClass: "btn-primary",
            confirmButtonText: "Ok",
            closeOnConfirm: true,
        });
    }
</script>