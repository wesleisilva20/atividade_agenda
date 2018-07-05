<?php

// Recebe os dados do formulário
$nome_usuario = $_POST["user"];
$email = $_POST["email"];
$senha = $_POST["password"];

// Verifica se os dados estão corretos
$nome_usuario = trim($nome_usuario);
$email = trim($email);
$senha = trim($senha);

$erros = "";
if ( empty($nome_usuario) )
    $erros .= "Campo nome do usuário está vazio. ";

if ( empty($email) )
    $erros .= "Campo e-mail está vazio. ";

if ( empty($senha) )
    $erros .= "Senha está vazia.";

if ( !empty($erros) )
{
    echo "
        <script type=\"text/javascript\">
            function alerta() {
                swal(\"".$erros."\");
            }
        </script>

        <html>
            <head>
                 <!-- <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/agenda_novo/pages/register.php\"> -->
            </head>
            <body onload=\"alerta();\">
            </body>
        </html>
    ";
    die();
}

// Parametriza a conexão com o banco de dados

$host = "localhost:3306";
$user = "root";
$password = "";
$database = "agenda";

// Faz a conexão com o servidor MySQL
$con = mysqli_connect($host, $user, $password);

// Verifica se ocorreu erro de conexão
if (!$con) {
    // Se sim, então encerra o programa com uma mensagem de erro
    die("Erro de conexão com o servidor do BD");
}

// Determina qual banco de dados que será utilizado
$db = mysqli_select_db($con, $database);

// Verifica se ocorreu erro na seleção
if (!$db) {
    // Se sim, então encerra o programa com uma mensagem de erro
    die("Erro ao selecionar o banco de dados.");
}

// Cria a sentença SQL para inserir o usuário
$sql = "insert into tbl_usuarios (nome_usuario, senha, email) values(\"$nome_usuario\", \"$senha\" ,\"$email\")";

// Envia o insert para o banco de dados
$result = mysqli_query($con,$sql);

?>

<html>
    <head>
        <META http-equiv="refresh" content="1;URL=http://localhost:8088/agenda_novo/pages/login.php">
    </head>
</html>