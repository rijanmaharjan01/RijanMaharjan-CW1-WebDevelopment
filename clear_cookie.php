<?php

setcookie('user_type', '', time() - 3600);
header('Location: login.html'); 

?>