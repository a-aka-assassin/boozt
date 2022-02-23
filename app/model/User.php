<?php

//makig a connection to database
$mysqli = new mysqli("localhost", "root", "", "boozt");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
