$('.modal#staticBackdropEdit').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var quarryID = $(e.relatedTarget).data('quarry-info');
    quarryID=Object.values(quarryID);
    $('form#quarryEdit').attr('action', `/edit/${quarryID[0]}`);
    //populate the textbox
    $(e.currentTarget).find('input[name="quarryTypes"]').val(quarryID[1]);
    $(e.currentTarget).find('input[name="controlNum"]').val(quarryID[2]);
    $(e.currentTarget).find('input[name="name"]').val(quarryID[3]);
    $(e.currentTarget).find('input[name="busName"]').val(quarryID[4]);
    $(e.currentTarget).find('input[name="busAddress"]').val(quarryID[5]);
    $(e.currentTarget).find('input[name="dateApplied"]').val(quarryID[6]);
    $(e.currentTarget).find('input[name="contactPerson"]').val(quarryID[7]);
    $(e.currentTarget).find('input[name="contactNum"]').val(quarryID[8]);
    $(e.currentTarget).find('input[name="postalAddress"]').val(quarryID[9]);
    $(e.currentTarget).find('input[name="municipality"]').val(quarryID[10]);
    $(e.currentTarget).find('input[name="status"]').val(quarryID[11]);
    $(e.currentTarget).find('input[name="firstNotice"]').val(quarryID[12]);
    $(e.currentTarget).find('input[name="firstNoticeDate"]').val(quarryID[13]);
    $(e.currentTarget).find('input[name="secondNotice"]').val(quarryID[14]);
    $(e.currentTarget).find('input[name="secondNoticeDate"]').val(quarryID[15]);
    $(e.currentTarget).find('input[name="thirdNotice"]').val(quarryID[16]);
    $(e.currentTarget).find('input[name="thirdNoticeDate"]').val(quarryID[17]);
    $(e.currentTarget).find('input[name="remarks"]').val(quarryID[18]);
    $(e.currentTarget).find('input[name="dateLastUpdated"]').val(quarryID[21]);
    console.log(quarryID)
    });