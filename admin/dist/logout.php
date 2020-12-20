<?php

include '../../config/config.php';
if(!isset($_SESSION)) session_start();

unset($_SESSION);
session_unset();
header('location:login.html');