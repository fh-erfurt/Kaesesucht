<?php

define ('ROOTPATH', strlen(dirname($_SERVER['SCRIPT_NAME'])) > 1 ? dirname($_SERVER['SCRIPT_NAME']).'/' : '/');
define('COREPATH',  'core'.DIRECTORY_SEPARATOR);
define('VIEWSPATH',  'views'.DIRECTORY_SEPARATOR);
define('CONTROLLERSPATH',  'controllers'.DIRECTORY_SEPARATOR);
define('MODELSPATH',  'models'.DIRECTORY_SEPARATOR);
define('ASSETPATH',  'assets'.DIRECTORY_SEPARATOR);