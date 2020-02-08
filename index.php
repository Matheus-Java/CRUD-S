<?php 
         require_once 'classe-de-backend.php';
                               //HOST     //BANCO  //USUARO  //SENHA
         $conect = new Produto("localhost", "cruds", "root",  "");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
         <link rel="stylesheet" href="css/cadastro.css">
         
         <title>Cadastro</title>
</head>
<body>
         <header>
                  
                  <nav>
                  
                           <ul>
                                    <li><a href="index.php">Cadastrar de Produtos</a></li>
                                    <li><a href="lista.php">Produtos Cadastrados</a></li>
                           </ul>
                  </nav>
         </header>
         <div id="logo">
         <img src="img/logo.png" alt="bredi-logo">
         </div>
         <div id="formulario">
                  <h2>Cadastramento de Produtos</h2>
                  <form method="post">
                           <label for="nomeProduto"> Produto: <input type="text" name="nome" id="nomeProduto"></label>
                           <label for="categoriaProduto">Categoria 
                                    <select name="categoria" id="categoriaProduto">
                                             <option value=""></option>
                                             <option value="4">Alimentos</option>
                                             <option value="3">Celulares</option>
                                             <option value="2">Eletrodomésticos</option>
                                             <option value="5">Informática</option>
                                    </select>
                           </label>
                           <label for="precoProduto">Preço: <input type="number" name="preco" step="any" id="precoProduto"></label>
                                    <input type="submit" value="Cadastrar">
                  </form>
         </div>
</body>
</html>

<?php
//Operação para fazer o recebimento dos dados e cadastra-los no banco
         if(isset($_POST['nome'])){
                  $nome = addslashes($_POST['nome']);
                  $categoria = addslashes($_POST['categoria']);
                  $preco = addslashes($_POST['preco']);

                           if(!empty($_POST['nome']) && !empty($_POST['categoria']) && !empty($_POST['preco']) ){
                                             if(!$conect -> cadastroProduto($nome,$preco,$categoria)){
                                                      echo "Cadastro Realizado com Sucesso!";
                                             }else{
                                                      echo "Erro ao Cadastrar";
                                             }        
                           }else{
                                    echo "Por favor Preencha Todos os Campos!";
                           }
         }
?>