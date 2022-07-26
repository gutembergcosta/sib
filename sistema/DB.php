<?php

class DB{

    private $mysqli;

    public function __construct(){

        
        $linkar = $_SERVER['HTTP_HOST'];
        if($linkar != "localhost"){    
            $hostname = 'localhost';
            $username =  'gutember_sib';
            $password =  'ol@ria01';
            $database =  'gutember_sib';
        }else{
            $hostname = 'localhost';
            $username =  'root';
            $password =  '';
            $database =  'sib';
        }

        $mysqli  = mysqli_connect($hostname, $username, $password, $database);
        $mysqli->set_charset("utf8");

        $this->mysqli = $mysqli;

    }

    public function query_simples($sql){

        $result = mysqli_query($this->mysqli,$sql);
        $rs = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $rs;
    }   
    
    public function query($sql){

        $result = mysqli_query($this->mysqli,$sql);
        $rs = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $rs;
    }

    public function queryBase($sql){
        //$sql = "INSERT INTO `usuarios`( `email`, `senha`, `perfil`, `nome`) VALUES ('value-2','value-3','value-4','value-5')";
        $rs = mysqli_query($this->mysqli,$sql);
                return $rs;
    }




    

    


}


?>