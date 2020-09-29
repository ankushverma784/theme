
$(document).ready(function() {
    $('#uploadButton').on('click',function(evt){
         evt.preventDefault();
         $('#fileUploadInput').click();
    });

    $("#fileUploadInput").change(function(){
        var file =  $("#fileUploadInput")[0].files[0].name;
        console.log(file);
       $('#showFileName').val(file); 
    });

});
