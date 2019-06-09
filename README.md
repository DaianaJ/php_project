To create this project I chose to use PHP with SQlite. SQlite is a very useful database, cross-platform, small and fast.
Also, it is used for mobile phones. To make requests to database I used Idiorm, a light ORM for PHP.

The structure of the project:
    - Html files represents a small temaplate used to create the frontend.
    - js folder. Every html file uses a javascript file to send requests to backend and to load info.
    - php folder. There resides all scripting files asociated with javascript files and db.php, which is a 
    script used to create the table 'users' in the database.
    - css, imges, fonts - auxiliary folders, in which static content is kept.
    
Functionalities:

    - register:
        For this function I created a form with the next fields: email, password and password retyping. All
      fields are retrieved and send to the php backend through jquery and ajax(I chose them because they are fast
      and easy to use). The main point here is that I create a record for a user, with password encrypted, and save it to database.
      After a successful creation, the user is redirected to the login page.
      
    - login:
        Here I retrieve the username and the password(using html5 "feature" attribute for security reasons and to skip other field
        checkings) entered into the form and I check if the user exists and has a valid password(comparing hashes with
        "password_verify"). If the credentials are valid, the user is redirected to the main page and his/her username and hashed
        password are saved into a session, for further use. I also set a cookie to identify the user.
      
    - recovery:
        If the user wants to recover his password, he/she must enter the email. If an associated account is found in the database,
        then I create a random password, update the user, and send him/her an email with the new password. For that, a valid SMTP
        server has to be configured on the machine.
       
    -logout:
        I redirect the user to the login page and unset session variables and cookies.
