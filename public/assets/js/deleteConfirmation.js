$(document).ready(function (){

    $('.deletebutton').on("click", (e) => {
        const id = e.target.id
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "DELETE",
                    url: baseUrl+'/delete/'+id,
                    success: function (response){
                        Swal.fire(
                            'Deleted!',
                            'The data has been deleted.',
                            'success'
                          )
                          .then((result) => {
                              location.reload();
                          })
                    }
                })
            }
          })

    })

});