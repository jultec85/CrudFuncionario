<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Cadastro de Funcionário</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/7f2d4360bd.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <a href="index.php">CRUD - Cadastro de funcionários</a>
        <a href="index.php"><i class="fas fa-home"></i></a>

    </header>
    <?php
        include 'controle/conexao.php';
    ?>
    
    <div class="adicionar">
        <a href="interface/addfuncionario.php">
            <div class="link">
            <span>+</span>
            <p>Adicionar</p>
            </div>
        </a>   
    </div>
      

    <h2>Lista de funcionários:</h2>

    <section class="flex">
    <?php    
        $funcionarios = mysqli_query($link, "SELECT * FROM funcionario");

        while($row = mysqli_fetch_assoc($funcionarios)){
    ?>
        <div>
            <a href="interface/verfuncionario.php?id=<?php echo $row["idf"]?>">
                <img src="<?php echo substr($row["foto"], 3)?>">
            </a>
            <div>  
            <a style="color: black;" href="interface/verfuncionario.php?id=<?php echo $row["idf"]?>">  
                <p><?php echo $row["nome"]?></p>
            </a>
            </div>    
        </div>
    <?php 
    };
    ?>
    </section>
</body>
</html>