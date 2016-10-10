<?php
include_once '../model/Produto.php';
include_once '../model/PropriedadesProduto.php';

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 09/10/2016
 * Time: 18:42
 */
class ProdutoController
{
    private $produto;
    private $propriedadesProduto;

    public function cadastrar()
    {

        $this->produto = new Produto();
        $this->propriedadesProduto = new PropriedadesProduto();

        $this->produto->setNome($_POST['nome']);

        $this->produto->cadastrarProduto();
        $produtoIDCadastrado = $this->produto->retornoFunc;

        for ($i = 0; $i < count($_POST['tamanho']); $i++) {
            $this->propriedadesProduto->setTamanho($_POST['tamanho'][$i]);
            $this->propriedadesProduto->setPreco($_POST['preco'][$i]);
            $this->propriedadesProduto->setIdProduto($produtoIDCadastrado);
            $this->propriedadesProduto->cadastrarPropriedadesProduto();
        }
    }
}