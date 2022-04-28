$(function () {
    $("#quarry-tab").on("click", () => {
        //hide the button next
        $("#next-page-tab").show();
        //show submit
        $("#submitBtn").hide();
    });

    $("form[action=quarry]").on("submit", (e) => {
        e.preventDefault();

        $("#submitBtn").prop("disabled", true);
        $("#spinner-submit").show();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const selectedMunicipalityValue = $(
            "form[action=quarry]"
        ).serializeArray()[11].value;
        const selectedMunicipalityText = $(
            `#municipality > option[value=${selectedMunicipalityValue}]`
        ).text();
        $.ajax({
            method: "POST",
            url: "/quarry",
            data: $("form[action=quarry]").serialize(),
            success: (response) => {
                const data = response.last_inserted;

                const row = `
             <tr  id="tableRowNo${data.id}">
                <input type="hidden" class="delete-id" value="${data.id}">
                <td class="cell">${data.control_number}</td>
                <td class="cell">${data.name}</td>
                <td class="cell">${selectedMunicipalityText}</td>
                <td class="cell">${data.date_applied}</td>
                <td class="cell">${data.status}</td>
                <td class="cell"><button id="editForm" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit" data-quarry-info="${data.id}">Edit</button>
                    <button class="btn-sm app-btn-secondary deletebutton" id="${data.id}">Delete</button>
                </td>
            </tr>`;
                $("table > tbody").append(row);
                $("#submitBtn").prop("disabled", false);
                $("#spinner-submit").hide();
                $.notify("Data added successfully!", {
                    autoHideDelay: 2000,
                    showAnimation: "fadeIn",
                    hideAnimation: "fadeOut",
                    hideDuration: 700,
                    arrowShow: false,
                    className: "success",
                });

                // for page ni
                $("#subQuarryTab").removeClass("fade show active");
                $("#quarryTab").addClass("fade show active");

                //for tab button ni
                $("button#sub-quarry-tab").removeClass("fade show active");
                $("button#quarry-tab").addClass("fade show active");

                $("#staticBackdrop").modal("toggle");
                $("form[action=quarry]").trigger("reset");
            },
        });
    });
});
