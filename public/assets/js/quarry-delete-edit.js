$(document).ready(function (){
    
    $('.modal#staticBackdropEdit').on('show.bs.modal', function(e) {
        var quarryID = $(e.relatedTarget).data('quarry-info');
        quarryID=Object.values(quarryID);
        quarryID.splice(3,1); // remove index 3
        $('form#quarryEdit').attr('action', `/edit/${quarryID[0]}`);
        //populate the textbox
        $(e.currentTarget).find('select[name="quarryTypes"]').val(quarryID[1]);
        $(e.currentTarget).find('input[name="controlNum"]').val(quarryID[2]);
        $(e.currentTarget).find('input[name="name"]').val(quarryID[3]);
        $(e.currentTarget).find('input[name="busName"]').val(quarryID[4]);
        $(e.currentTarget).find('input[name="busAddress"]').val(quarryID[5]);
        $(e.currentTarget).find('input[name="dateApplied"]').val(quarryID[6]);
        $(e.currentTarget).find('input[name="contactPerson"]').val(quarryID[7]);
        $(e.currentTarget).find('input[name="contactNum"]').val(quarryID[8]);
        $(e.currentTarget).find('input[name="postalAddress"]').val(quarryID[9]);
        $(e.currentTarget).find('#municipality').val(quarryID[10]);
        $(e.currentTarget).find('input[name="status"]').val(quarryID[11]);
        $(e.currentTarget).find('input[name="firstNotice"]').val(quarryID[12]);
        $(e.currentTarget).find('input[name="firstNoticeDate"]').val(quarryID[13]);
        $(e.currentTarget).find('input[name="secondNotice"]').val(quarryID[14]);
        $(e.currentTarget).find('input[name="secondNoticeDate"]').val(quarryID[15]);
        $(e.currentTarget).find('input[name="thirdNotice"]').val(quarryID[16]);
        $(e.currentTarget).find('input[name="thirdNoticeDate"]').val(quarryID[17]);
        $(e.currentTarget).find('textarea[name="remarks"]').val(quarryID[18]);
        const recentDate = new Date(quarryID[20]);
        $(e.currentTarget).find('input[name="dateLastUpdated"]').val(`${recentDate.getFullYear()}-${recentDate.getMonth()+1}-${recentDate.getDate()}`);

        // console.log(quarryID)
        
        });

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