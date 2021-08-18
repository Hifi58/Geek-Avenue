<?php
require_once('sql/connection.php');
session_start();
require("Function/hote.php");
if(!isconnected()){
   header("location: login.php");
exit(); 
}
