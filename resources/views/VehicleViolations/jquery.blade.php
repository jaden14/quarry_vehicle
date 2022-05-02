@section('scripts')
<script>
    $(document).ready(function () {

        fetchVehicleViolation();

        // Fetch Data Table
        function fetchVehicleViolation()
        {
            $.ajax({
                type: "GET",
                url: "/fetch-vehicleviolation",
                dataType: "json",

                success: function (response) {

                    // Clear the table first
                    $('tbody').html("");
                    
                    // Clear Conveyance and Vehicle Violation Type 
                    $('#conveyance_type').html("");
                    $('#violation_type').html("");

                    // Add Dynamic Data
                    $.each(response.vehicleviolations, function (key, item) {


                        //const d = new Date("2022");  
                        var formattedDate  = new Date(item.date);
                        var d = formattedDate.getDate();
                        var m =  formattedDate.getMonth();
                        m += 1;  // JavaScript months are 0-11
                        var y = formattedDate.getFullYear();

                        $('tbody').append('<tr>\
                                <td class="cell">'+item.id+'</td>\
                                <td class="cell"><span>'+m+ '-' +d+ '-' +y+'</span> <span class="note">'+item.time+'</span></td>\
                                <td class="cell">'+item.plate_no+'</td>\
                                <td class="cell">'+item.responsible+'</td>\
                                <td class="cell">'+item.remarks+'</td>\
                                <td class="cell">\
                                    <button type="button" value="'+item.id+'" class="edit_vehicleviolation btn-sm app-btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg> Edit</button>\
                                    <button type="button" value="'+item.id+'" class="view_vehicleviolation btn-sm app-btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg> View</button>\
                                    <button type="button" value="'+item.id+'" class="delete_vehicleviolation btn-sm app-btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg> Delete</button>\
                                </td>\
                            </tr>');
                    });

                    
                    // Conveyance Type Data
                    $.each(response.conveyancetypes, function (key, item) {
                        $('.conveyance_type').append('<option value="'+item.description+'">'+item.description+'</option>');
                        //$('.conveyance_type').append($('<option></option>').attr('value', item.description).text(item.description));
                    });

                    // Violation Type Data
                    $.each(response.violationtypes, function (key, item) {
                        $('.violation_type').append('<option value="'+item.description+'">'+item.description+'</option>');
                    });
                   
                }

            });
        }

        //View Data in Modal
        $(document).on('click', '.view_vehicleviolation', function (e) {
            e.preventDefault();
            var id = $(this).val();

            console.log(id);

            $.ajax({
                type: "get",
                url: "/view-vehicleviolation/"+id,
                success: function (response) {

                    //const d = new Date("2022");  
                    var formattedDate  = new Date(response.violationtypes['date']);
                    var d = formattedDate.getDate();
                    var m =  formattedDate.getMonth();
                    m += 1;  // JavaScript months are 0-11
                    var y = formattedDate.getFullYear();

                    // Catch Error
                    if(!!response.status) {
                        //$('#view_vehicleviolations').find('span[id="date"]').html(response.data['date']);
                        $('#view_vehicleviolations').find('span[id="date"]').html('<label for="date" class="col-form-label">Date:</label> <input type="text" class="form-control" value="'+m+ '-' +d+ '-' +y+'" readonly>');
                        $('#view_vehicleviolations').find('span[id="time"]').html('<label for="time" class="col-form-label">Time:</label> <input type="text" class="form-control" value="'+response.violationtypes['time']+'" readonly>');
                        $('#view_vehicleviolations').find('span[id="plate_no"]').html('<label for="plate_no" class="col-form-label">Plate No:</label> <input type="text" class="form-control" value="'+response.violationtypes['plate_no']+'" readonly>');
                        $('#view_vehicleviolations').find('span[id="conveyance"]').html('<label for="conveyance" class="col-form-label">Conveyance:</label> <input type="text" class="form-control" value="'+response.violationtypes['conveyance_type']+'" readonly>');
                        $('#view_vehicleviolations').find('span[id="violation"]').html('<label for="violation" class="col-form-label">Violation:</label> <input type="text" class="form-control" value="'+response.violationtypes['violation_type']+'" readonly>');
                        $('#view_vehicleviolations').find('span[id="responsible"]').html('<label for="responsible" class="col-form-label">Responsible:</label> <input type="text" class="form-control" value="'+response.violationtypes['responsible']+'" readonly>');
                        $('#view_vehicleviolations').find('span[id="remarks"]').html('<label for="remarks" class="col-form-label">Remarks:</label> <input type="text" class="form-control" value="'+response.violationtypes['remarks']+'" readonly>');
                        $('#view_vehicleviolations').modal('show');

                    } else {

                        // Remove modal
                        $('#view_vehicleviolations').modal('hide');
                        alert("An error occured while fetching single data")

                    }

                    
                }
            })
        });

        // Save Form Data
        $(document).on('click', '.create_vehicleviolation', function (e) {
            e.preventDefault();
            var data = {
                'date': $('.date').val(),
                'time': $('.time').val(),
                'plate_no': $('.plateno').val(),
                'responsible': $('.responsible').val(),
                'conveyance_type': $('.conveyance_type').val(),
                'violation_type': $('.violation_type').val(),
                'remarks': $('.remarks').val(),  
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "vehicleviolations",
                data: data,
                dataType: "json",
                success: function (response) {

                    //Catch error
                    if(response.status == 400)
                    {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass("alert alert-danger");

                        $('.date').addClass("alert alert-danger");
                        $('.time').addClass("alert alert-danger");
                        $('.plateno').addClass("alert alert-danger");
                        $('.responsible').addClass("alert alert-danger");
                        $('.remarks').addClass("alert alert-danger");

                        $.each(response.errors, function (key, err_values) {
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        })
                    } else {

                        // Remove modal
                        $('#vehicleviolations').modal('hide');

                        // Remove modal input value
                        $('#vehicleviolations').find('input').val("");

                        fetchVehicleViolation(); //fetch record

                        swal('success', 'Success', response.message);
                        
                    }
                }
            });
        });

        // Delete data
        $(document).on('click', '.delete_vehicleviolation', function (e) {
            e.preventDefault();
            var id = $(this).val(); // get ID

            Swal.fire({
                title: 'Are you sure you want to delete this?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/delete-vehicleviolation/"+id,
                        data: {
                            '_method': 'delete'
                        },
                        success: function (response, textStatus, xhr) {
                            console.log(response);
                            if(response.status == 404)
                            {
                                swal('warning', 'Oops!', response.message);
                            } else {

                                swal('success', 'Success', response.message);

                                fetchVehicleViolation();

                            }
                        }
                    });
                }
            });

        });

        function swal(icon, title, message)
        {
            // Show success
            Swal.fire({
                icon: icon,
                title: title,
                text: message,
                timer: 3000,
            });
        }

    });
</script>

@endsection
