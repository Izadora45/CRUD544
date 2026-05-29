<?php
    require "../Classes/usuario.php"; 
    $usuario = new Usuario();
    $usuario ->conectar("crud544","localhost","root","");

    if(isset($_GET['id_usuario']))
    {
        $id_update = addslashes($_GET['id_usuario']);
        $dados = $usuario->buscarDadosUsuario($id_update);
    }

    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $telefone = addslashes($_POST['telefone']);

        if(!empty($nome) && !empty($email) && !empty($telefone))
        {
            $usuario->atualizarDadosUsuarios($id_update, $nome, $email, $telefone);
            
            header("location:listar.php");
        }
    }
?>  


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR Usuario</title>
</head>
<!-- vai ter que estudar a arquitetura mvc -->
<body>
    <h2 class="titulo-pagina">EDITAR USUÁRIO</h2>
    <form method="post">
        <input type="text" name="nome" value="<?php echo $dados['nome'];?>">
        <input type="email" name="email" value="<?php echo $dados['email'];?>">
        <input type="tel" name="telefone" value="<?php echo $dados['telefone'];?>">
        <input type="submit" value="ATUALIZAR">
    </form>
</body>
</html>