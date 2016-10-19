<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 04/10/2016
 * Time: 16:13
 */
class PropriedadesProduto extends  Banco
{
    /**
     * @var
     */
    private $idProduto;
    /**
     * @var
     */
    private $tamanho;
    /**
     * @var
     */
    private $preco;

    /**
     * @return mixed
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * @param mixed $idProduto
     */
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }

    /**
     * @return mixed
     */
    public function getTamanho()
    {
        return $this->tamanho;
    }

    /**
     * @param mixed $tamanho
     */
    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return string
     */
    public function cadastrarPropriedadesProduto() {
       $this->cadastrar("insert into propriedades_produto (tamanho, preco) values ('".$this->tamanho."', '".$this->preco."')");
       return $this->cadastrar("insert into produto_has_propriedades_produto (propriedades_produto_id, produto_id) values ('".$this->retornoFunc."', '".$this->getIdProduto()."')");
    }
}