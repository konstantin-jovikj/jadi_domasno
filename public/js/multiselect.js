$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "Select...",
        allowClear: true
    });
    let table = new DataTable('#cookTable');
    let adminTable = new DataTable('#adminTable');
});
