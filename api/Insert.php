<?php
require_once '../controller/UsuarioController.php';
require_once '../controller/ProdutoController.php';

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 12/09/2016
 * Time: 09:23
 */

header('Content-Type: application/json', 'charset=utf-8', true);
header('Content-Type: application/x-www-form-urlencoded', 'charset=utf-8', true);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT');

class Insert
{
    private $usuarioController;
    private $produtoController;
    private $pedidoController;


    function __construct()
    {


        if (isset($_POST['q']) && $_POST['q'] == "usuario") {
            echo $this->doItUsuario();
        }

        if (isset($_POST['q']) && $_POST['q'] == "produto") {
            echo $this->doItProduto();
        }

        if (isset($_POST['q']) && $_POST['q'] == "pedido") {

        }
    }

    function doItUsuario()
    {
        $this->usuarioController = new UsuarioController();
        return $this->usuarioController->cadastrar();
    }

    function doItProduto()
    {
        $this->produtoController = new ProdutoController();
        return $this->produtoController->cadastrar();
    }

    function doItPedido()
    {

    }


}

new Insert();