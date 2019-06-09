function sendEmail() {
    
    $("#req_form").on('submit',function(evt){
        evt.preventDefault();
    });

    var request = $.ajax({
    type: "POST",
    url: 'http://localhost/project/php/forgot.php',
    dataType: 'json',
    data: {
        email_forgot: document.getElementById("email_forgot").value
    },
    success: function(data){
        
        if (data.error == 'yes'){
            document.getElementById("ret_message").innerHTML = "You don't have an account. Please register first.";
            
        } else {
            if(data.location){
                document.getElementById("ret_message").innerHTML = "An email has been sent to your address.";
                window.location.href = data.location;
                
            }
            
        }

    }
    });
    console.log("exit");
        
    return false;
    
}

