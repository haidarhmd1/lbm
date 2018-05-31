<?php

    include 'directories.php';

    $hlp = new directories();

    if($_GET['action'] == 'getit'){
        $hlp->selectStmtLmt("maintenance", 20);
    }
    if($_GET['action'] == 'getit'){
        $hlp->selectStmtLmt("finance", 20);
    }

?>