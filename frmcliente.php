<?php
$idcliente = isset($_GET["idcliente"]) ? $_GET["idcliente"]: null;

try {
    $servidor =  "localhost";
    $usuario = "root";
    $senha   = "";
    $bd      = "bdprojeto";
    $con     = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha);

    if ($idcliente){
        $sql = "SELECT * FROM clientes where idcliente= :idcliente";
        $stmt->bindValue(":idcliente",$idcliente);
        $stmt->execute();
    }
    if($_POST){
        of($_POST["idcliente"]){
            $sql = "UPDATE  clientes SET nome=:nome, email=:email WHERE (:nome,:email)";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":nome",$_POST["nome"]);
            $stmt->bindValue(":email",$_POST["email"]);
            $stmt->bindValue(":idcliente",$_POST["idcliente"]);
            $stmt->execute()
        } else { $sql = "INSERT INTO clientes (nome,email) values (:nome,:email)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":nome",$_POST["nome"]);
                $stmt->bindValue(":email",$_POST["email"]);
                $stmt->execute();
        }
            header("location: listarclientes.php");
        }


   

} catch (PDOException){
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Formulário Cliente</h1>
    <hr>
    <form method="POST">
    nome <input type="text" name="nome" value="<?php echo isset($cliente)? $cliente->nome :null ?> "> <br>
    email <input type="email" name="email" value="<?php echo isset($cliente)? $cliente->email :null ?>">
    <input type="hidden" name="idcliente" value="<?php echo isset($cliente)? $cliente->email :null ?>">
    <input type="submit" value="Cadastrar">

    </form>
</body>
</html>