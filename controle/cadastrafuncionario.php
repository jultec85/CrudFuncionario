<?php

include("conexao.php");

$nome = $_POST['nome'];
$endereco = $_POST['end'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$sexo = $_POST['sexo'];
$telefone = $_POST['tel'];


$inserir = "insert into funcionario (nome, endereco, rg, cpf, sexo, foto)" 
."values ('$nome','$endereco','$rg','$cpf','$sexo',null)";

 mysqli_query($link, $inserir) or die(mysqli_error($link));

 $buscar = mysqli_query($link, "SELECT MAX(idf) FROM funcionario");

 while($row = mysqli_fetch_assoc($buscar)){
   $id = $row["MAX(idf)"];
 }

 $destino = '../fotos/' . $id."_".$_FILES['foto']['name'];
 
$arquivo_tmp = $_FILES['foto']['tmp_name'];
 
move_uploaded_file($arquivo_tmp, $destino);

$insere_imagem = "UPDATE funcionario SET foto = '$destino' WHERE idf = $id";     
mysqli_query($link,$insere_imagem) or die(mysqli_error());

 foreach ($telefone as $i => $value)  {
    $inserir_tel = "insert into telefones (telefone, idf) values ('$telefone[$i]', $id)";
    mysqli_query($link, $inserir_tel) or die(mysqli_error($link));
 }

 echo "<script type='text/javascript'> location.href = '../interface/verfuncionario.php?id=$id';</script>";

