<?php
    require "../Classes/usuario.php"; //eaaw usuario é referente ao arquivo
    $usuario = new Usuario(); // empresa, ou analista aqui é a onde ele vai receber um novo objeto da classe usuario, se criar uma função você vai ter que chamar no require e você também pode chamar em um arquivo
    $usuario ->conectar("crud544","localhost","root","");
//qual é a variavel que tem permição para acessar a minha classe usuario
    $dados = $usuario->ListarDados();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar usuário</title>
</head>
<body>
    <h2 class="titulo-pagina">LISTAR USUÁRIOS</h2>

    <a href="cadastro.php"><button>CADASTRAR</button></a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID USUARIO</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <?php
            foreach($dados as $pessoa) //para cada foreach de dados guarde os dados na variavel pessoa
            {

        ?>
        <tbody>
            <tr>
                <td>
                    <!-- Informações sobre o id do usuario -->
                    <?php echo $pessoa ['id_usuario'] ?>
                </td>
            
                <td>
                    <!-- Informações sobre o NOME do usuario -->
                    <?php echo $pessoa ['nome'] ?>
                </td>

                <td>
                    <!-- Informações sobre o EMAIL do usuario -->
                    <?php echo $pessoa ['email'] ?>
                </td>

                </td>

                <td>
                    <!-- Informações sobre o TELEFONE do usuario -->
                    <?php echo $pessoa ['telefone'] ?>
                </td>
                <td>
                    <a href="editar.php?id_usuario=<?php echo $pessoa ['id_usuario']; ?>">EDITAR</a>
                    <a href="excluir.php?id_usuario=<?php echo $pessoa ['id_usuario']; ?>">EXCLUIR</a>
                    <!-- aqui já não é tão seguro porque o id do usuario, o briane briga com a enilda -->
                </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
</body>
</html>