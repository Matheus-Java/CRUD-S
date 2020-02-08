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
        
         <title>Lista de Produtos Cadastrados</title>
         <link rel="stylesheet" href="css/cadastro.css">
         <link rel="stylesheet" href="css/lista.css">
         
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
         <div id="lista-produtos">
                  <h1>Lista de Produtos</h1>
                  <ul>
                           <li> <a href="lista.php"> Todos os Produtos</a></li>
                           <li> <a href="alimentos.php"> Alimentos </a></li>
                           <li> <a href="celulares.php"> Celulares </a></li>
                           <li> <a href="eletro.php"> Eletrodomésticos </a></li>
                           <li> <a href="infor.php"> Informática </a></li>
                  </ul>
         </div>
    
         <section>
                  <table>

                           <tr id="titulo">
                                    <td>PRODUTOS</td>
                                    <td>CATEGORIA</td>
                                    <td>PREÇO</td>
                           </tr>

         <?php
         $dados = $conect->listarEletro();
                  if (count($dados)>0) {
                           for ($i=0; $i < count($dados); $i++) { 

                                    echo "<tr id='dados'>";
                                    foreach ($dados[$i] as $key => $valor) {
                                             if ($key != "id_produto") {
                                             echo "<td>".$valor."<hr size=2>"."</td>";   
                                             }
                                    }
                            ?>      
                                    
                  <?php
                                    echo "</tr>";
                 
                           }
                        
                  }else{
                           echo "Não há Produtos Cadastrados!";
                  }?>

                  </table>

        

</body>
</html>

