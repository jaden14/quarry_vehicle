$(document).ready(function () {
    $("select#quarryTypes").on("change", function () {
        $(".prog-bar-control").show();
        const typeSelected = this.value;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "POST",
             url: "/lastid",
           data: { type: typeSelected },
            success: function (response) {
                const idNumber = ++response.last_insert_id;
                const idNumberLength = idNumber.toString().length;
                const newIdNumber = idNumberLength > 2 ? idNumber : `${idNumberLength == 2 ? "0" : "00"}` + idNumber;
                setTimeout(() => {
                    $(".prog-bar-control").hide();
                    $("input[name=controlNum]").val(`${typeSelected}-${newIdNumber}`);
                }, 1000);
            },
        });
    });
});
