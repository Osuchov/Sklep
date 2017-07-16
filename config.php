<?php

require_once ("General.php");

    $configDB = array(
        'servername' => "localhost",
        'username' => "root",
        'password' => "coderslab",
        'baseName' => "shop"
    );
    
General::setDatabaseConfig($configDB);

?>