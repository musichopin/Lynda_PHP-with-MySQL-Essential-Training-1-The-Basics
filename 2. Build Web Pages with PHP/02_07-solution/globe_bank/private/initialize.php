<?php

  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

// __FILE__ is C:\wamp64\www\Exercise Files\Chapter_02\02_07-solution\globe_bank\ private\initialize.php
// SHARED_PATH is C:\wamp64\www\Exercise Files\Chapter_02\02_07-solution\ globe_bank\private/shared
// $_SERVER['SCRIPT_NAME'] is /Exercise Files/Chapter_02/02_07-solution/globe_bank/public/staff/index.php on index.php file inside staff dir (its changeable w/ dir)
// $doc_root is /Exercise Files/Chapter_02/02_07-solution/globe_bank/public 

// *file paths on hard drive are defined above (for including header and footer), whereas url links are defined below (esp for href attribute inside header.php)*

  // Assign the root URL to a PHP constant
  // * Do not need to include the domain
  // * Use same document root as webserver
  // * Can set a hardcoded value (no need to):
  // define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
  // define("WWW_ROOT", ''); // for domain name/root in production
  // * Can dynamically find everything in URL up to "/public":
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  require_once('functions.php');

?>
