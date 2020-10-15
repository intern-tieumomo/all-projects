<?php
/**
 * Your Instagram Access Token
 * How to generate access token - http://instagram.pixelunion.net/
 */

// Consumer Key
define('ACCESS_TOKEN', '2955800576.e6b770c.298a4ea57ed94bf6be27544740bd10eb');

// Cache Settings
define('CACHE_ENABLED', true);
define('CACHE_LIFETIME', 600); // in seconds
define('HASH_SALT', md5(dirname(__FILE__)));
