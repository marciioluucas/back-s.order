<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 04/10/2016
 * Time: 15:56
 */
class Produto extends Banco
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $nome;
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
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
    function cadastrarProduto()
    {
        if ($this->verificaExistente("id", "produto", "nome", $this->nome)) {
            return json_encode(array("msg" => "Produto ja existente!", "id_cadastrado" => 0));
        } else {
            return $this->cadastrar("insert into produto (nome) values ('" . $this->nome . "')");
        }
    }

    /**
     * @param $filter
     * @param $filterValue
     */
    function listarProduto($filter, $filterValue)
    {
        $this->campos = ["id", "nome"];
        return $this->listar($filter, $filterValue);
    }

    /**
     * @param $idProduto
     */
    function listarPropriedadesProduto($idProduto)
    {
        $i = 1;
        $query = $this->typeSQL("select * from produto_has_propriedades_produto 
inner join propriedades_produto on propriedades_produto_id = propriedades_produto.id where produto_id = $idProduto");
        echo "{\n    ";
        echo "\"tamanhos\" : [\n";
        $precos = "";
        while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            if($i != mysqli_num_rows($query)){
                echo "          \"" . $r['tamanho'] . "\",\n";
                $precos .= "\"" . $r['preco'] . "\",\n       ";
            }else{
                echo "          \"" . $r['tamanho'] . "\"\n";
                $precos .= "\"" . $r['preco'] . "\"\n       ";
            }
$i++;
        }
        echo "],\n";
        echo "   \"precos\" : [\n";


        echo "       ".$precos;

        echo "]\n";
        echo "}";
    }
}