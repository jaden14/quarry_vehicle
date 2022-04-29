@section('scripts')

<script>
    $(document).ready(function () {

        fetchstudent();

        // Fetch Data
        function fetchstudent()
        {
            $.ajax({
                type: "GET",
                url: "/fetch-conveyance",
                dataType: "json",
                success: function (response) {

                    // Clear the table first
                    $('tbody').html("");

                    // Add Dynamic Data
                    $.each(response.conveyances, function (key, item) {
                        $('tbody').append('<tr>\
                                <td>'+item.id+'</td>\
                                <td>'+item.description+'</td>\
                                <td>\
                                    <button type="button" value="'+item.id+'" class="edit_conveyance btn btn-warning btn-sm">Edit</button>\
                                    <button type="button" value="'+item.id+'" class="delete_conveyance btn btn-danger btn-sm">Delete</button>\
                                </td>\
                            </tr>');
                    });
                }
            });
        }

        $(document).on('click', '.edit_conveyance', function (e) {
            e.preventDefault();
            var id = $(this).val();

            console.log(id);

            $('#EditConveyanceModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/edit-conveyance/"+id,
                success: function (response) {

                    // Catch Error
                    if(response.status == 404) {
                        $('#success_message').html(""); // Empty
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);

                        swal('danger', response.message);
                    } else {

                        // Put the data inside modal input
                        $('#edit_description').val(response.conveyance.description);
                        $('#edit_id').val(id);
                    }
                }
            })
        });

        $(document).on('click', '.update_conveyance', function (e) {
            e.preventDefault(); // Prevent page load

            $('.update_conveyance').text('Updating');

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
                url: "update-conveyance/"+id,
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

                        $('.update_conveyance').text('Update');

                    } else if(response.status == 404) {

                        swal('warning', 'Oops!', response.message);

                        $('.update_conveyance').text('Update');

                    } else {

                        $('#updateform_errList').html("");

                        $('#EditConveyanceModal').modal('hide');

                        $('.update_conveyance').text('Update');

                        fetchstudent();
                        swal('success', 'Success', response.message);

                    }
                }
            });
        });

        // Save Form Data
        $(document).on('click', '.create_conveyance', function (e) {
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
                url: "/conveyance",
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
                        $('#CreateConveyanceModal').modal('hide');
                        // Remove modal input value
                        $('#CreateConveyanceModal').find('input').val("");

                        fetchstudent();

                        swal('success', 'Success', response.message);
                    }
                }
            });
        });

        // Delete data
        $(document).on('click', '.delete_conveyance', function (e) {
            e.preventDefault();
            var id = $(this).val(); // get ID

            Swal.fire({
                title: 'Would you like to delete this record?',
                showCancelButton: true,
                confirmButtonColor: 'LightSeaGreen',
                confirmButtonText: 'Delete',
                }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/delete-conveyance/"+id,
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
