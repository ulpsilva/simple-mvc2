<?php

require "config/database.php";
require "config/properties.php";

require "libs/Bootstrap.php";
require "libs/Controller.php";
require "libs/View.php";
require "libs/Model.php";

require "models/productModel.php";
require "models/userModel.php";
require "models/categoryModel.php";

require "libs/Helper.php";
require "libs/Session.php";
$session = new Session();

// Bootstrapping the project
$app = new Bootstrap();