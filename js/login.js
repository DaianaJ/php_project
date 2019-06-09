function checkUser() {
    
        $("#login_form").on('submit',function(evt){
            evt.preventDefault();
        });


        var request = $.ajax({
            type: "POST",
            url: 'http://localhost/project/php/login.php',
           dataType: 'json',
            data: {
                email_register: document.getElementById("email_register").value,
                password: document.getElementById("password").value
            },
            success: function(data){
                
                if (data.error == 'yes'){
                      document.getElementById("err").innerHTML = "Invalid username or password";
                } else {
                        if(data.location){
                            window.location.href = data.location;
                        }
                }

            }
        });
        console.log("exit");
                
        return false;
    
}