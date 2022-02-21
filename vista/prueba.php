<?php

$pass = password_hash('FERnanda98:)', PASSWORD_DEFAULT, ['cost'=>12]);
echo $pass;

?>