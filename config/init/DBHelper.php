<?php

    include 'init.php';

    class dbHelper extends DBConnecter{
        
        public function getSelect(){
            
            $query = "SELECT * FROM dealersections";
            $res = $this->connect()->query($query);
            
            if($res-> num_rows > 0){
                while($row = $res->fetch_assoc()){
                    echo $row;
                }
                
            }
            
        }
    }

    $c = new dbHelper();
    $c->getSelect();
?>