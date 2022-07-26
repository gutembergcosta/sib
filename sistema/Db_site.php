<?php

require('DB.php');


class Db_site extends DB {

    function __construct(){
        parent:: __construct(); 
    }


    public function load_usuarios(){

        $sql = "SELECT * FROM usuarios";       
        $rs = $this->query($sql);
        return $rs;
    }

    public function verificaLogin($email,$senha){

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";       
        $rs = $this->query_simples($sql);
        return $rs;
    }

    public function get_by_id($id,$tabela){

        $sql = "SELECT * FROM $tabela WHERE id = '$id' ";       
        $rs = $this->query_simples($sql);
        return $rs;
    }

    public function insert($data){

        $columns = "`".implode("`, `",array_keys($data))."`";
        $values  = "'".implode("', '", array_values($data))."'";
        $sql = "INSERT INTO usuarios ($columns) VALUES ($values)";
        $rs = $this->queryBase($sql);

        return $rs;
    }

    public function edit($data,$id){

        $item = '';
        foreach ($data as $key => $value)
        {
            $item .= "$key = '$value', ";
        }

        $params = trim($item, " ,");

        $sql = "UPDATE usuarios SET $params WHERE id = $id;";
        $rs = $this->queryBase($sql);

        return $rs;
    }

    public function deletar($id){

        $sql = "DELETE FROM usuarios WHERE id = $id";
        $rs = $this->queryBase($sql);

        return $rs;
    }




    

    public function load_item_img($tipo, $arquivo_tipo='img'){

        $sql = "SELECT 
        item.id,
        item.tkn,
        item.nome,
        item.info,
        item.tipo,
        item.url,
        item.categoria,
        item.slug,
        item.texto,
        item.ordem,
        arquivos.nome as 'arquivo' 
        FROM item 
        INNER JOIN arquivos ON item.tkn = arquivos.tkn 
        WHERE item.tipo ='$tipo' 
        AND arquivos.tipo='$arquivo_tipo' 
        ";       

        $rs = $this->query($sql);
       
        return $rs;
    }

    public function load_img_tkn($tkn, $tipo='img'){

        $sql = "SELECT 
        arquivos.nome as 'img' 
        FROM arquivos 
        WHERE tipo ='$tipo' 
        AND tkn='$tkn' 
        ";       

        $rs = $this->query($sql);

        if($rs){
            return $rs[0]['img'];
        }else{
            return '';
        }
       
        
    }

    public function load_item_categoria_img($tipo, $arquivo_tipo='img'){

        $sql = "SELECT 
        item.id,
        item.tkn,
        item.nome,
        item.info,
        item.tipo,
        item.url,
        item.categoria,
        categorias.nome as 'categoria_nome',
        item.slug,
        item.texto,
        item.ordem,
        arquivos.nome as 'arquivo' 
        FROM item 
        INNER JOIN arquivos ON item.tkn = arquivos.tkn 
        INNER JOIN categorias ON item.categoria = categorias.tkn
        WHERE item.tipo ='$tipo' 
        AND arquivos.tipo='$arquivo_tipo' 
        ";       

        $rs = $this->query($sql);
       
        return $rs;
    }

    public function load_galeria($tipo,$tkn)
    {

        $sql = "SELECT *
        FROM arquivos 
        WHERE tipo ='$tipo' 
        AND tkn ='$tkn' 
        ORDER BY id DESC
        ";       

        $rs = $this->query($sql);
       
        
        return $rs;
    }


    


}
