<?php 
class Produto{
         private $pdo;
         public function __construct($host,$dbname,$user,$password)
         {
                  try {
                           $this->pdo = new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$password);
                  } catch (PDOException $erroPDO) {
                           echo "Erro no banco: ".$erroPDO->getMessage();
                           exit();
                  }catch (Exception $erro){
                           echo "Erro acontecendo fora do banco: ".$erro->getMessage();
                  }            
         }


                  //Função para cadastro de produtos
         public function cadastroProduto($nome, $preco, $categoria){
                 
                  $sql = $this->pdo->prepare("INSERT INTO produtos (nome, preco, categoria_id) VALUES (:n,:p,:c)");
                  $sql -> bindValue(":n",$nome);
                  $sql -> bindValue(":p",$preco);
                  $sql -> bindValue(":c",$categoria);
                  $sql -> execute();
         }

                  //Função de listagem/exibição 
         public function listarProduto(){
                  $res = array();
                  $sql = $this->pdo->query("SELECT produtos.id_produto,produtos.nome,categorias.titulo,produtos.preco from produtos,categorias WHERE produtos.categoria_id = categorias.id ORDER BY produtos.nome;");
                  $res = $sql -> fetchAll(PDO::FETCH_ASSOC);
                  return $res; 
         }
                  //Função de listar Alimentos
         public function listarAlimentos(){
                  $res = array();
                  $sql = $this->pdo->query("SELECT produtos.nome,categorias.titulo,produtos.preco FROM produtos,categorias WHERE produtos.categoria_id = categorias.id AND produtos.categoria_id = 4");
                  $res = $sql -> fetchAll(PDO::FETCH_ASSOC);
                  return $res;
         }
                   //Função de listar Celulares
         public function listarCelulares(){
                  $res = array();
                  $sql = $this->pdo->query("SELECT produtos.nome,categorias.titulo,produtos.preco FROM produtos,categorias WHERE produtos.categoria_id = categorias.id AND produtos.categoria_id = 3");
                  $res = $sql -> fetchAll(PDO::FETCH_ASSOC);
                  return $res;
         }
                   //Função de listar Eletrodomesticos
         public function listarEletro(){
                  $res = array();
                  $sql = $this->pdo->query("SELECT produtos.nome,categorias.titulo,produtos.preco FROM produtos,categorias WHERE produtos.categoria_id = categorias.id AND produtos.categoria_id = 2");
                  $res = $sql -> fetchAll(PDO::FETCH_ASSOC);
                  return $res;
         }
                   //Função de listar Informatica
         public function listarInfo(){
                  $res = array();
                  $sql = $this->pdo->query("SELECT produtos.nome,categorias.titulo,produtos.preco FROM produtos,categorias WHERE produtos.categoria_id = categorias.id AND produtos.categoria_id = 5");
                  $res = $sql -> fetchAll(PDO::FETCH_ASSOC);
                  return $res;
         }

                  //Função para exclur
         public function excluirProduto($id){
                  $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id_produto = :id");
                  $sql ->bindValue(":id",$id);
                  $sql -> execute();
         }

                  //Função para buscar dados para atualizar
         public function buscarDadosProduto($id){
                  $res = array();
                  $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id_produto = :id");
                  $sql -> bindValue(":id",$id);
                  $sql -> execute();
                  $res = $sql->fetch(PDO::FETCH_ASSOC);
                  return $res;
         }


                  //Função para atualizar
         public function atualizarProdutos($nome ,$categoria ,$preco ,$id){

                  $sql = $this->pdo->prepare("UPDATE produtos SET nome = :n, preco = :p, categoria_id = :c WHERE id_produto = :id");
                  $sql -> bindValue(":n",$nome);
                  $sql -> bindValue(":p",$preco);
                  $sql -> bindValue(":c",$categoria);
                  $sql -> bindValue(":id",$id);
                  $sql -> execute();
         }         

}?>