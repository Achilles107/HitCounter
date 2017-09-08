<?php
require 'session.php';
session_destroy();
header('Location: '.$http_referer);
?>