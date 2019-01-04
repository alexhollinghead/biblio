<?php

/**
 * Configuration for the database connection
 */

$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "biblio"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );