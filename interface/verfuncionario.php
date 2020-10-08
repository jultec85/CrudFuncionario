<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Cadastro de Funcionário</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/7f2d4360bd.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <a href="../index.php">CRUD - Cadastro de funcionários</a>
    </header>
    <?php
        include '../controle/conexao.php';

        $id = $_GET["id"];

        $buscar = mysqli_query($link, "SELECT * FROM funcionario WHERE idf = $id");

        while($row = mysqli_fetch_assoc($buscar)){
    ?>
    <h2>Funcionário:</h2>
        <section class="ver">
            <div class="imagem">
                <img src="<?php echo $row["foto"]?>">
            </div>
            <div class="infor">
                <div>
                    <label>Nome:</label> 
                    <span><?php echo $row["nome"]?></span>
                </div>
                <div>
                    <label>Endereço:</label> 
                    <span><?php echo $row["endereco"]?></span>
                </div>
                <div>
                    <label>RG:</label> 
                    <span><?php echo $row["rg"]?></span>
                </div>
                <div>
                    <label>CPF:</label> 
                    <span><?php echo $row["cpf"]?></span>
                </div>
                <div>
                    <label>Sexo:</label> 
                    <span><?php echo $row["sexo"]?></span>
                </div>
                <div>
                    <label>Telefone:</label> 
                    <?php
                    $buscar = mysqli_query($link, "SELECT * FROM telefones WHERE idf = $id");

                    while($row = mysqli_fetch_assoc($buscar)){
                    ?>
                    <span><?php echo $row["telefone"]?> / </span>
                    <?php }; ?>
                </div>
            </div>
            <div class="icones">
                <div>
                    <a class="voltar" href="../index.php"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div>    
                    <a class="btn_editar" href="editarfuncionario.php?id=<?php echo $id ;?>"><i class="fas fa-edit"></i></a>
                </div>    
                <div>    
                    <a class="btn_excluir" href="javascript:func()" onclick="exclusao('<?php echo $id ;?>')"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            


        </section>
        <?php 
            };
        ?>    
    <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>