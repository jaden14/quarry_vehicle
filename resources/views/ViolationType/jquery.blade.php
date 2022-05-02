@section('scripts')

<script>
    $(document).ready(function () {

        fetchstudent();

        // Fetch Data
        function fetchstudent()
        {
            $.ajax({
                type: "GET",
                url: "/fetch-violationtype",
                dataType: "json",
                success: function (response) {

                    // Clear the table first
                    $('tbody').html("");

                    // Add Dynamic Data
                    $.each(response.violationtypes, function (key, item) {
                        $('tbody').append('<tr>\
                                <td>'+item.id+'</td>\
                                <td>'+item.description+'</td>\
                                <td>\
                                    <button type="button" value="'+item.id+'" class="edit_violationtype btn-sm app-btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>Edit</button>\
                                    <button type="button" value="'+item.id+'" class="delete_violationtype btn-sm app-btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg> Delete</button>\
                                </td>\
                            </tr>');
                    });
                }
            });
        }

        //Edit Data Modal
        $(document).on('click', '.edit_violationtype', function (e) {
            e.preventDefault();
            var id = $(this).val();

            console.log(id);

            $('#EditViolationTypeModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/edit-violationtype/"+id,
                success: function (response) {

                    // Catch Error
                    if(response.status == 404) {
                        $('#success_message').html(""); // Empty
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);

                        swal('danger', response.message);
                    } else {

                        // Put the data inside modal input
                        $('#edit_description').val(response.violationtype.description);
                        $('#edit_id').val(id);
                    }
                }
            })
        });


        //Update Data
        $(document).on('click', '.update_violationtype', function (e) {
            e.preventDefault(); // Prevent page load

            $('.update_violationtype').text('Updating');

            var id = $('#edit_id').val();
            var data = {
                'description' : $('#edit_description').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "update-violationtype/"+id,
                data: data,
                dataType: "json",
                success: function (response) {

                    if(response.status == 400)
                    {
                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass("alert alert-danger");

                        $.each(response.errors, function (key, err_values) {
                            $('#updateform_errList').append('<li>'+err_values+'</li>');
                        })

                        $('.update_violationtype').text('Update');

                    } else if(response.status == 404) {

                        swal('warning', 'Oops!', response.message);

                        $('.update_violationtype').text('Update');

                    } else {

                        $('#updateform_errList').html("");

                        $('#EditViolationTypeModal').modal('hide');

                        $('.update_violationtype').text('Update');

                        fetchstudent();
                        swal('success', 'Success', response.message);

                    }
                }
            });
        });

        // Save Form Data
        $(document).on('click', '.create_violationtype', function (e) {
            e.preventDefault();
            var data = {
                'description': $('.description').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/violationtype",
                data: data,
                dataType: "json",
                success: function (response) {

                    //Catch error
                    if(response.status == 400)
                    {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass("alert alert-danger");

                        $.each(response.errors, function (key, err_values) {
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        })
                    } else {

                        // Remove modal
                        $('#CreateViolationTypeModal').modal('hide');
                        // Remove modal input value
                        $('#CreateViolationTypeModal').find('input').val("");

                        fetchstudent();

                        swal('success', 'Success', response.message);
                    }
                }
            });
        });

        // Delete data
        $(document).on('click', '.delete_violationtype', function (e) {
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
                        url: "/delete-violationtype/"+id,
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
                                fetchstudent();

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
