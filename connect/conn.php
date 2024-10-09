<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "shanuar";

// Create connection
$conn = mysqli_connect($server_name, $user_name, $password, $database_name);


define('CLIENT_ID', '328501866406-ahafslirlt6pmoffnsgt7sfaq03fkm8k.apps.googleusercontent.com');
define('CLIENT_SECRET', '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');
define('REDIRECT_URI', 'http://localhost/dozkart/googleAuth');
define('FACEBOOK_ID', '2198171277216998');
define('FACEBOOK_SECRET', '1761ae208a97d471f85b1de4da62d3e1');
define('FACEBOOK_REDIRECT_URI', 'http://localhost/dozkart/facebookAuth');

define('JWT_SECRET_KEY', 'h!v0jkb(jb8ajpz7wp90zi+^85rb#7h0vv_tvo_%z0v6nl9wn1');
// allow doming
define('ALLOWED_DOMIN', 'http://localhost/dozkart');
?>