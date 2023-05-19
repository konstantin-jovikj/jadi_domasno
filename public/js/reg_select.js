$(document).ready(function () {

    if ($('#role').val() == 2) {
        $(".cook-row").removeClass('d-none');
        $(".cook-row").addClass('d-flex');
    } else {
        $(".cook-row").removeClass('d-flex');
        $(".cook-row").addClass('d-none');
    }

    $("#role").change(function () {
        console.log('Changed');
        if ($(this).val() == 2) {
            $(".cook-row").removeClass('d-none');
            $(".cook-row").addClass('d-flex');
        } else {
            $(".cook-row").removeClass('d-flex');
            $(".cook-row").addClass('d-none');
        }
    });
});
