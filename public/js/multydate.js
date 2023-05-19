// $(".date").multiDatesPicker({
//     multidate: true,
//     numberOfMonths: 2, // Show two months in the calendar
//     format: "dd-mm-yyyy"
//   });

$(document).ready(function () {

    $("#datePick").multiDatesPicker({
        multidate: true,
        numberOfMonths: 2, // Show two months in the calendar
        dateFormat: 'yy-mm-dd'

    });
});
