<?php
session_start();
unset($_SESSION["autorisation"]);
header("Location:index.php");
