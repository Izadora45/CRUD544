<?php
    require "../Classes/usuario.php"; 
    $usuario = new Usuario();
    $usuario ->conectar("crud544","localhost","root","");

    if(isset($_GET['id_usuario']))
    {
        $id_usuario = addslashes($_GET['id_usuario']);//aqui ele vai pegar o id pela url que será gerados lá no usuario
        $usuario->excluirUsuario($id_usuario);
    }
    header("location:listar.php"); //uma das formas de percorrer o siatema entende são as rotas
?>
