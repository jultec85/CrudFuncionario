<?php
include("conexao.php");

$id = $_GET['id'];

$buscar = mysqli_query($link, "SELECT foto FROM funcionario WHERE idf = $id");
while($row = mysqli_fetch_assoc($buscar)){
    $foto = $row["foto"];
  }

unlink($foto);

$excluir = "DELETE FROM funcionario WHERE idf=$id";

 mysqli_query($link, $excluir) or die(mysqli_error($link));

 echo "<script type='text/javascript'> location.href = '../index.php';</script>";