<?php
require_once 'lib/Propel.php';
Propel::init("build/conf/demosexto-conf.php");
set_include_path("build/classes/" . PATH_SEPARATOR . get_include_path());
?>
