<?php
include("conexao.php");

$id = $_GET['id'];
$idf = $_GET['idf'];

$excluir = "DELETE FROM telefones WHERE id_tel=$id";

 mysqli_query($link, $excluir) or die(mysqli_error($link));

 echo "<script type='text/javascript'> location.href = '../interface/editarfuncionario.php?id=$idf';</script>";