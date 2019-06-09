<?php
require_once 'idiorm.php';
ORM::configure('sqlite:./db.sqlite');
 
ORM::get_db()->exec('DROP TABLE IF EXISTS users;');
ORM::get_db()->exec(
        'CREATE TABLE users (' .
        'id INTEGER PRIMARY KEY AUTOINCREMENT, ' .
        'username VARCHAR(50), ' .
        'password VARCHAR(50)' .
        ')'
    );
 
?>