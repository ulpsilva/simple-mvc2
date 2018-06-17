<?php

require "config/database.php";
require "config/properties.php";

require "libs/Helper.php";
require "libs/Session.php";
$session = new Session();

require "libs/Bootstrap.php";
require "libs/Controller.php";
require "libs/View.php";
require "libs/Model.php";

// Bootstrapping the project
$app = new Bootstrap();