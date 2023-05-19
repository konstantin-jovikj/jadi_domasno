$(document).on('click', '.btn-archive', function() {
    console.log('clicked');
    var userId = $(this).attr('data-id');
    Swal.fire({
        title: 'Are you sure you want to archive the user?',
        text: "You can later restore the user",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Archive it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'api/user/archive/' + userId,
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
                    Swal.fire('Archived!', data.success, 'success')
                    $(".swal2-confirm").click(function() {
                        console.log("Confirmation button clicked");
                        location.reload()
                    });
                }
            })
        }
    })
});
