<?php

    include '../init/init.php';

    class directories extends DBConnecter
    {

        //select stmnts
        public function selectStmt($table)
        {
            $sql = "SELECT * FROM ".$table;
            $res = $this->connect()->query($sql);

            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    $arrayName[] = array($row);
                }
                echo json_encode($arrayName);
            }
        }
        public function selectStmtLmt($table,$limit)
        {
            $sql = "SELECT * FROM ".$table." LIMIT ".$limit;
            $res = $this->connect()->query($sql);

            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    $arrayName = array($row);
                }
                echo json_encode($arrayName);
            }
        }




        //filter stmtns






        //view the output

        
    }
    


?>