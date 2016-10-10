<?php
include_once '../model/Produto.php';
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 09/10/2016
 * Time: 18:42
 */
class ProdutoController
{
    private $produto;

    public function cadastrar()
    {
        $this->produto = new Produto();
        if ($_POST['nome'] && $_POST['tamanho'] && $_POST['preco']) {
            $this->produto->setNome($_POST['nome']);



            $this->produto->cadastrarProduto();
            $this->produto->setTamanho($_POST['tamanho']);
            $this->produto->setPreco($_POST['preco']);
        } else {
            return "
      {
            \"erro\":{
                \"classe\":\"UsuarioController\",
                \"metodo\":\"cadastrar()\"
            },
            \"msg\": \"Não informado algum dos campos obrigatórios!\"
        }
        ";
        }

    }
}