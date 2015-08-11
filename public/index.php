<?php

use vendor_name\project_name\App;

global $loader;

// Class loader is injected to app, can be used to load module's classes.
$loader = $loader ?: require_once __DIR__ . '/../vendor/autoload.php';

// Get rid of global variables
return call_user_func(function() use ($loader) {
  // APP_ROOT is useful to get app directories/files.
  !defined('APP_ROOT') && define('APP_ROOT', dirname(dirname(__DIR__)));

  // app object, the core of the application.
  $app = new App(require dirname(__DIR__) . '/config.php', $loader);

  // Handle user's request or return the application object.
  return defined('APP_CLI') ? $app : $app->run();
});