$('document').ready(function()
{
    
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'edit.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#edit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
               if(data=="registered")
                {

                    $("#edit").html('Signing Up');
                    setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("successreg.php"); }); ',5000);

                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#edit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; SAVE');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

    /* nhập số */
    function onlyNumbers(evt) {
        var e = event || evt;
        var charCode = e.which || e.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function AutoCompl() {
    var temp = document.getElementById("poi_lat").value;
    document.getElementById("poi_lat_lon").innerHTML = "You selected: " + temp;
}

}); 
