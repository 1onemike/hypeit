<?php

include 'core.php';
session_destroy();

header('Location: '.$http_referer);

?>