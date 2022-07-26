<?php
session_start();
header('Content-Type: text/html; charset=utf-8');


require_once 'sistema/variaveis.php';
require_once 'twig/autoload.php';
require_once 'sistema/Db_site.php';

$loader = new \Twig\Loader\FilesystemLoader('site/templates');
$twig = new \Twig\Environment($loader);

$db = new Db_site();

if ($segmento == '') {

    $template               = 'inicio';
    $data['titulo_pagina']  = '';
}

if ($segmento == 'usuarios') {

    if (!isset($_SESSION["logado"]))  exit;;

    $template                   = 'usuarios';
    $data['titulo_pagina']      = 'Adicionar usuário';
    $data['action']             = 'add';
    $data['usuarios']           = $db->load_usuarios();

    if ($slug01 == 'edit') {
        $data['dataForm']       = $db->get_by_id($slug02, 'usuarios');
        $data['action']         = 'edit';
    }
}

if ($segmento == 'edit') {

    $template                   = 'edit-usuario';
    $data['titulo_pagina']      = '';
    $data['usuarios']           = $db->load_usuarios();
}

if ($segmento == 'ajax') {

    if ($slug01 == 'login') {
        $data = [];
        $usuario = $db->verificaLogin($_POST['email'], $_POST['senha']);
        if ($usuario) {
            $_SESSION["logado"] = $usuario;
            $urlRedirect = $base_url . 'usuarios';
            $data['destino'] = $urlRedirect;
        } else {
            $data['msg'] = "Falha ao efetuar login!";
        }
    }

    if ($slug01 == 'salvar') {

        $data = [];
        if (isset($slug02)) {
            $db->edit($_POST, $slug02);
            $data['msg-modal']  = "Usuário atualizado com sucesso!";
            $data['titulo']     = "Usuário Atualizado";
        } else {
            $db->insert($_POST);
            $data['titulo']     = "Usuário Inserido";
            $data['msg-modal']  = "Usuário inserido com sucesso!";
        }
    }

    if ($slug01 == 'deletar') {
        $db->deletar($_POST['id']);
        $data['msg-modal']  = "Usuário removidos com sucesso!";
        $data['titulo']     = "Usuário Removido";
        $data['msg-id']     = $_POST['id'];
    }

    echo json_encode($data);
    exit;
}

$pagina = $twig->load($template . '.htm');
echo $pagina->render($data);
