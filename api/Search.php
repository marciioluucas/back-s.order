<?php
require_once '../model/Banco.php';
require_once '../model/Usuario.php';
require_once '../model/Produto.php';

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 12/09/2016
 * Time: 09:20
 */
class Search
{
    private $usuario;
    private $produto;


    function __construct()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT');
        if (isset($_GET['q']) && $_GET['q'] == "usuario") {

            echo $this->doItUsuario();
        }

        if (isset($_GET['q']) && $_GET['q'] == "produto" && isset($_GET['typeSearch']) &&
            $_GET['typeSearch'] == "precos-e-tamanhos"
        ) {

            echo $this->doItProdutoPrecosETamanhos();
        }

        if (isset($_GET['q']) && $_GET['q'] == "produto" && !isset($_GET['typeSearch'])) {

            echo $this->doItProduto();

        }


    }

    function doItUsuario()
    {
        $this->usuario = new Usuario();
        if (isset($_GET['filtro']) &&
            isset($_GET['valorFiltro'])
        ) {
            $this->usuario->tabela = "usuario";
            return $this->usuario->listarUsuario(1, 1);

        } else {
            return
                "
{
  \"api\": {
     \"erro\":\"API-INSERT 001 | Usuario:\",
     \"msg\":\"Não informado qual metodo a seguir.\"
  }
}
";
        }
    }

    function doItProduto()
    {
        $this->produto = new Produto();
        if (isset($_GET['filtro']) && isset($_GET['valorFiltro'])) {
            $this->produto->tabela = "produto";
            return $this->produto->listarProduto($_GET['filtro'], $_GET['valorFiltro']);
        } else {
            return
                "
{
  \"api\": {
     \"erro\":\"API-SEARCH 001 | Produto:\",
     \"msg\":\"Não informado qual metodo a seguir.\"
  }
}
";
        }
    }

    function doItPedido()
    {

    }

    function doItProdutoPrecosETamanhos()
    {
        $this->produto = new Produto();
//        if (isset($_GET['idProduto']) && $_GET['idProduto'] != 0) {
            return $this->produto->listarPropriedadesProduto($_GET['idProduto']);
//        } else {
//            return json_encode(array("tamanhos" => array("nenhum"), "precos" => array(0.00)));
//        }
    }


}

new Search();