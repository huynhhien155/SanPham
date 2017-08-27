$('document').ready(function()
{
    /* validation */
    $("#register-form").validate({
        rules:
        {
            poi_name: {
                required: true,
                minlength: 3
            },
            poi_kana: {
                required: true,
                minlength: 3
            },
            
            
            
        },
        messages:
        {
            poi_name: "Enter a Valid Poi_name",
            
            
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'register.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger-false"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry poi_name already taken !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; SAVE');

                    });

                }
                else if(data=="registered")
                {

                    $("#btn-submit").html('Signing Up');
                    setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("successreg.php"); }); ',5000);

                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; SAVE');

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
