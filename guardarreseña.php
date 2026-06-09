<?php

session_start();
include 'includes/db.php';

if(!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario_id'];
$producto = (int)$_POST['producto_id'];
$estrellas = (int)$_POST['estrellas'];
$comentario = $conn->real_escape_string($_POST['comentario']);

$conn->query("
INSERT INTO resenas
(usuario_id,producto_id,estrellas,comentario)
VALUES
($usuario,$producto,$estrellas,'$comentario')
");

header("Location: detalleProducto.php?id=".$producto);
exit();
