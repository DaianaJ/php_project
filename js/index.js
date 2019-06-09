function logout() {
    
    $.get("http://localhost/project/php/logout.php");
    window.location.href = "http://localhost/project/login.html";

    return false;
}