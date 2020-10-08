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
    ?>

    <h2>Adicionar funcionário:</h2>

    <form method="post" enctype="multipart/form-data" action="../controle/cadastrafuncionario.php">
        <section class="grid">
            <div>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" style="width: 35em" require>
            </div>
            <div>
                <label for="end">Endereço: </label>
                <input type="text" name="end" id="end" style="width: 33.2em" require>
            </div>
            <div>
                <label for="rg">RG: </label>
                <input type="text" name="rg" id="rg" style="width: 12em" require>
            </div>
            <div>
                <label for="cpf">CPF: </label>
                <input type="text" name="cpf" id="cpf" style="width: 11.5em" require>
            </div>
            <div>
                <label for="sexo">Sexo: </label>
                <select name="sexo" style="width: 15em">
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                </select>
            </div>
            <div id="telefone">
                <label for="tel">Telefone: </label>
                <input type="text" name="tel[]" id="tel" style="width: 11.5em;">
                <div id="addtel" onclick="addtelefone()">+</div>
            </div>
            <div id="foto">
                <label for="">Adicione uma foto: </label>
                <br>
                <input type='file' name='foto'>
                <img />
            </div>    
            <div>
                <input type="submit" value="Salvar" style="cursor: pointer;">
            </div>
        </section>
    </form>

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    
</body>
</html>