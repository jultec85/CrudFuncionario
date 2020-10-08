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
            <form action="../controle/alterafuncionario.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id?>">
                <div class="infor">
                    <div>
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" id="nome" style="width: 30em" value="<?php echo $row["nome"]?>" require>
                    </div>
                    <div>
                        <label for="end">Endereço: </label>
                        <input type="text" name="end" id="end" style="width: 30em" value="<?php echo $row["endereco"]?>" require>
                    </div>
                    <div>
                        <label for="rg">RG: </label>
                        <input type="text" name="rg" id="rg" style="width: 12em" value="<?php echo $row["rg"]?>" require>
                    </div>
                    <div>
                        <label for="cpf">CPF: </label>
                        <input type="text" name="cpf" id="cpf" style="width: 11.5em" value="<?php echo $row["cpf"]?>" require>
                    </div>
                    <div>
                        <label for="sexo">Sexo: </label>
                        <select name="sexo" style="width: 15em">
                            <?php
                            if($row["sexo"] == "masculino"){
                            ?>
                                <option value="masculino" selected>Masculino</option>
                                <option value="feminino">Feminino</option>
                            <?php } else {?>
                                <option value="masculino">Masculino</option>
                                <option value="feminino" selected>Feminino</option>
                            <?php };?>
                        </select>
                    </div>
                    <div>
                        <div id="telefone">
                                <label for="tel">Telefone: </label>
                            <?php
                            $buscar = mysqli_query($link, "SELECT * FROM telefones WHERE idf = $id");
                            $cont = 0;

                            while($row2 = mysqli_fetch_assoc($buscar)){
                                if($cont == 0){
                            ?>
                                <input type="text" name="tel[]" id="tel" value='<?php echo $row2["telefone"]?>' style="width: 11.5em;" disabled><a class="excluir" href="../controle/excluirtelefone.php?id=<?php echo $row2["id_tel"]?>&idf=<?php echo $id;?>"><i class="fas fa-trash-alt"></i></a>
                            <?php 
                                } else { ?>
                                    <input type="text" name="tel[]" id="tel3" value='<?php echo $row2["telefone"]?>' style="width: 11.5em;"disabled><a class="excluir" href="../controle/excluirtelefone.php?id=<?php echo $row2["id_tel"]?>&idf=<?php echo $id;?>"><i class="fas fa-trash-alt"></i></a>
                                <?php 
                                    };
                                    $cont++;
                                };
                                ?>
                            <br><input type='text' name='tel2[]' id='tel3' style='width: 11.5em'>    
                            <div id="addtel" onclick="addtelefone2()">+</div>
                        </div>
                    </div>
                    <div id="foto">
                        <label for="">Alterar a foto? </label>
                        <br>
                        <input type='file' name='foto'>
                        <img src="<?php echo $row["foto"]?>">
                    </div>
                    <div>
                        <input type="submit" value="Salvar" style="cursor: pointer;">
                    </div>  
                </div>
            </form>  
        </section>
        <?php 
            };
        ?>    
        <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>