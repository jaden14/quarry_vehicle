$(document).ready(function () {
    $("form[action=editQuarry]").on("submit", (e) => {
        e.preventDefault();
        $("#submitUpdate").prop("disabled", true);
        $("#spinner-update").show();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const data = $("form[action=editQuarry]").serialize();
        const selectedMunicipalityValue = $(
            "form[action=editQuarry]"
        ).serializeArray()[11].value;
        const selectedMunicipalityText = $(
            `#municipality > option[value=${selectedMunicipalityValue}]`
        ).text();

        $.ajax({
            method: "PUT",
            url: "/edit",
            data: data,
            success: (response) => {
                const data = response.last_updated;

                const row = `
                <input type="hidden" class="delete-id" value="${data.id}">
                <td class="cell">${data.control_number}</td>
                <td class="cell">${data.name}</td>
                <td class="cell">${selectedMunicipalityText}</td>
                <td class="cell">${data.date_applied}</td>
                <td class="cell">${data.status}</td>
                <td class="cell"><button id="editForm" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit" data-quarry-info="${data.id}">Edit</button>
                    <button class="btn-sm app-btn-secondary deletebutton" id="${data.id}">Delete</button>
                </td>
           `;
                $(`table > tbody > tr#tableRowNo${data.id}`).html(row);
                $("#submitUpdate").prop("disabled", false);
                $("#spinner-update").hide();

                $.notify("Data Updated successfully!", {
                    autoHideDelay: 2000,
                    showAnimation: "fadeIn",
                    hideAnimation: "fadeOut",
                    hideDuration: 700,
                    arrowShow: false,
                    className: "success",
                });
                $("#staticBackdropEdit").modal("toggle");
                $("form[action=editQuarry]").trigger("reset");
            },
        });
    });

    $(".modal#staticBackdropEdit").on("show.bs.modal", function (e) {
        var quarryID = $(e.relatedTarget).data("quarry-info");

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/certainUser",
            data: { id: quarryID },
            success: (response) => {
                response = response.user_info;

                $(e.currentTarget).find('input[name="updateId"]').val(quarryID);

                $(e.currentTarget)
                    .find('select[name="quarryTypes"]')
                    .val(response.quarry_type);
                $(e.currentTarget)
                    .find('input[name="controlNum"]')
                    .val(response.control_number);
                $(e.currentTarget)
                    .find('input[name="name"]')
                    .val(response.name);
                $(e.currentTarget)
                    .find('input[name="busName"]')
                    .val(response.bus_name);
                $(e.currentTarget)
                    .find('input[name="busAddress"]')
                    .val(response.bus_address);
                $(e.currentTarget)
                    .find('input[name="dateApplied"]')
                    .val(response.date_applied);
                $(e.currentTarget)
                    .find('input[name="contactPerson"]')
                    .val(response.contact_person);
                $(e.currentTarget)
                    .find('input[name="contactNum"]')
                    .val(response.contact_num);
                $(e.currentTarget)
                    .find('input[name="postalAddress"]')
                    .val(response.postal_address);
                $(e.currentTarget)
                    .find("#municipality")
                    .val(response.municipality);

                $(e.currentTarget)
                    .find('input[name="status"]')
                    .val(response.status);
                $(e.currentTarget)
                    .find('input[name="firstNotice"]')
                    .val(response.first_notice);
                $(e.currentTarget)
                    .find('input[name="firstNoticeDate"]')
                    .val(response.first_notice_date);
                $(e.currentTarget)
                    .find('input[name="secondNotice"]')
                    .val(response.second_notice);
                $(e.currentTarget)
                    .find('input[name="secondNoticeDate"]')
                    .val(response.second_notice_date);
                $(e.currentTarget)
                    .find('input[name="thirdNotice"]')
                    .val(response.third_notice);
                $(e.currentTarget)
                    .find('input[name="thirdNoticeDate"]')
                    .val(response.third_notice_date);
                $(e.currentTarget)
                    .find('textarea[name="remarks"]')
                    .val(response.remarks);
                const recentDate = new Date(response.updated_at);
                $(e.currentTarget)
                    .find('input[name="dateLastUpdated"]')
                    .val(
                        `${recentDate.getFullYear()}-${
                            recentDate.getMonth() + 1
                        }-${recentDate.getDate()}`
                    );
            },
        });
    });

    $("table").on("click", ".deletebutton", (e) => {
        //$(".deletebutton").on("click", (e) => {
        const id = e.target.id;

        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host;

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#tableRowNo${id}`).remove();
                $.ajax({
                    type: "DELETE",
                    url: baseUrl + "/delete/" + id,
                    success: function (response) {
                        Swal.fire(
                            "Deleted!",
                            "The data has been deleted.",
                            "success"
                        );
                    },
                });
            }
        });
    });
});
