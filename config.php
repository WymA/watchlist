<?php
// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost:8000/watchlist/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'watchlist');
define('DB_USER', 'Wym');
define('DB_PASS', '1234');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... 
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'Niubilimentality');