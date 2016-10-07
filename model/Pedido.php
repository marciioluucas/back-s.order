<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 04/10/2016
 * Time: 15:55
 */
class Pedido extends Banco
{
    private $id;
    private $nomeCliente;
    private $isLevar;
    private $isPronto;
    private $idProdutos; //Array

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }

    /**
     * @param mixed $nomeCliente
     */
    public function setNomeCliente($nomeCliente)
    {
        $this->nomeCliente = $nomeCliente;
    }

    /**
     * @return mixed
     */
    public function getIsLevar()
    {
        return $this->isLevar;
    }

    /**
     * @param mixed $isLevar
     */
    public function setIsLevar($isLevar)
    {
        $this->isLevar = $isLevar;
    }

    /**
     * @return mixed
     */
    public function getIsPronto()
    {
        return $this->isPronto;
    }

    /**
     * @param mixed $isPronto
     */
    public function setIsPronto($isPronto)
    {
        $this->isPronto = $isPronto;
    }


    function cadastrarPedido()
    {
       return $this->cadastrar("insert into pedido (nome_cliente, is_levar) values ('" . $this->nomeCliente .
            "', '" . $this->isLevar . "')");


    }

    function alterarPedido()
    {
        $sql = "update pedido set nome_cliente = '$this->$this->nomeCliente', is_levar = '$this->islevar', is_pronto = '$this->isPronto'";
        $sql .= " where id = " . $this->id;
        $this->alterar($sql);
    }

    function excluirPedido()
    {
        $this->excluir("update usuario set ativado = 0");
    }

    function listarPedido($filter, $filterValue)
    {
        $this->campos = ["id", "nome", "email", "senha"];
        return $this->listar($filter, $filterValue);
    }
}