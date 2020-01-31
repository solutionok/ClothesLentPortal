<?php
// This file includes some important Model files and functions that are required for almost every page.
ob_start();
session_start();
// error_reporting(0);
include("model.php");
include("config.php");
date_default_timezone_set('Etc/UTC');

?>