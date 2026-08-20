<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "crud_aula";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error)
}


// CADASTRAR
if (isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $nome, $email);
    $stmt->execute();

    header("Location: index.php");
    exit;
}


// EXCLUIR
if (isset($_GET['excluir'])) {

    $id = $_GET['excluir'];

    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}


// EDITAR
if (isset($_POST['editar'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssi", $nome, $email, $id)
    $stmt->execute();

    header("Location: index.php");
    exit;
}


// BUSCAR USUARIOS
$sql = "SELECT id, nome, email FROM usuarios ORDER BY id DESC";
$resultado = $conn->query($sql)

?>