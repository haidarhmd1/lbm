<?php

    include 'directories.php';

    $hlp = new directories();

    if($_GET['action'] == 'getit'){
        $hlp->selectStmt("maintenance");
    }

?>