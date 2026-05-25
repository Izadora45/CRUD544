<?php 
require '../Classes/usuario.php'; 
$usuario = new Usuario(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="titulo-pagina">CADASTRO DE USUÁRIO</h2>
    <form method="post">
        <input type="text" name="nome" id="" class="input-form" placeholder="Digite seu nome.">
        <input type="email" name="email" id="" class="input-form" placeholder="Digite seu email.">
        <input type="tel" name="telefone" id="" class="input-form" placeholder="Digite seu telefone">
        <input type="password" name="senha" id="" class="input-form" placeholder="Digite sua senha.">
        <input type="password" name="confSenha" id="" class="input-form" placeholder="Confirme sua senha.">
        <input type="submit" value="CADASTRAR">
        <p>Já é cadastrado? Clique <a href="login.php">aqui</a>para acessar</p>
    </form>

    <?php 
    if(isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $confSenha = addslashes($_POST['confSenha']); 

        // Verificar se todos os campos estão preenchidos
        if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confSenha)) {
            
            $usuario->conectar("crud544","localhost","root","");
            
            if($usuario->msgErro == "") {
                echo "conectou"; 
                
                if($senha == $confSenha) {
                    if($usuario->cadastrarUsuario($nome, $email, $telefone, $senha)) {
                        ?>
                        <div class="msg-usuario">
                            <p>Usuário Cadastrado com sucesso!</p>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="msg-usuario">
                            <p>Usuário já cadastrado!</p>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="msg-usuario">
                        <p>Senha e Confirmar senha não conferem!</p>
                    </div>
                    <?php
                }

            } else {
                ?>
                <div class="msg-usuario">
                    <p>Erro de conexão com o banco.</p> 
                    <?php echo "Erro: ". $usuario->msgErro; ?>
                </div>
                <?php
            }

        } else {
            ?>
            <div class ="msg-usuario">
                <p>Preencha todos os campos!</p>
            </div>
            <?php
        }
    } 
    ?>

</body>
</html>
