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
         $dados = $conect->listarProduto();
                  if (count($dados)>0) {
                           for ($i=0; $i < count($dados); $i++) { 

                                    echo "<tr id='dados'>";
                                    foreach ($dados[$i] as $key => $valor) {
                                             if ($key != "id_produto") {
                                             echo "<td>".$valor."<hr size=2>"."</td>";   
                                             }
                                    }
                            ?>      
                                    <td id="botao-lateral"> 
                                    <a href="lista.php?id_up=<?php echo $dados[$i]['id_produto'];?>" class="botao">Editar</a>
                                    <a href="lista.php?id=<?php echo $dados[$i]['id_produto'];?>" class="botao">Excluir</a>
                                    </td>
                  <?php
                                    echo "</tr>";
                 
                           }
                        
                  }else{
                           echo "Não há Produtos Cadastrados!";
                  }?>

                  </table>

        <?php
        //Operação para buscar dados para atualizar
                if(isset($_GET['id_up'])){
                        $id_update = addslashes($_GET['id_up']);
                        $atualizar = $id_update;
                        $res = $conect -> buscarDadosProduto($id_update);
                        
                }
        ?>
               
         </section>
         <form method="POST">
                        <?php 
                        if(isset($_POST['nome_up'])){
                                $nome_up = addslashes($_POST['nome_up']);
                                $categoria_up = addslashes($_POST['categoria_up']);
                                $preco_up = addslashes($_POST['preco_up']);
                                if(!empty($_POST['nome_up']) && !empty($_POST['categoria_up']) && !empty($_POST['preco_up']) && !empty($atualizar)){
                                        $conect -> atualizarProdutos($nome_up, $categoria_up, $preco_up, $atualizar);
                                        header("location: lista.php");
                                }
                        }
                        ?>
                  <input type="text" name="nome_up" class="editar" 
                  value="<?php 
                                if(isset($res)){ 
                                        echo $res['nome'];
                                }?>"> <br>

                  <input type="text" name="categoria_up" class="editar" 
                  value="<?php 
                                if(isset($res)){ 
                                        echo $res['categoria_id'];
                                }?>"> <br>

                  <input type="number" name="preco_up" step="any" class="editar" 
                  value="<?php 
                                if(isset($res)){ 
                                        echo $res['preco'];
                                }?>">
                <input type="submit" value="Atualizar" class="botao-editar">
                </form>

</body>
</html>

<?php
         //Receber o id e enviar para a função excluir
         if(isset($_GET['id'])){
                  $id_excluir = addslashes($_GET['id']);
                  $conect -> excluirProduto($id_excluir);
                  header("location: lista.php");
         }        
?>


