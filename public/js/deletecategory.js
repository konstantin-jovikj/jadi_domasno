$(document).on('click', '.btn-delete-category', function() {
    console.log('clicked');
    var catId = $(this).attr('data-id');
    Swal.fire({
        title: 'Are you sure you want to delete this Category?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'api/category/delete/' + catId,
                method: 'DELETE',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                }
            }).done(function(data) {
                if (data.error != undefined) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.error,
                    })
                } else {
                    Swal.fire('Deleted!', data.success, 'success')
                    $(".swal2-confirm").click(function() {
                        console.log("Confirmation button clicked");
                        location.reload()
                    });
                }
            })
        }
    })
});
