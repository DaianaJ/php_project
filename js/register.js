function register() {

    
        $("#register_form").on('submit',function(evt){
            evt.preventDefault();
        });

        retype = document.getElementById("password-retype").value;
        if (document.getElementById("password").value != retype) {
                document.getElementById("retype").innerHTML = "Password mismatch";
        } else {
                    var request = $.ajax({
                        type: "POST",
                        url: 'http://localhost/project/php/register.php',
                        dataType: 'json',
                        data: {
                            email_register: document.getElementById("email_register").value,
                            password: document.getElementById("password").value
                        },
                        success: function(data){                 

                                if(data.location){
                                    console.log("redir");
                                        window.location.href = data.location;
                                }

                        }
                    });
        }
                
        return false;

    
}