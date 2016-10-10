<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 09/09/2016
 * Time: 13:55
 */
class Banco
{
    private $sql;
    public $query;
    public $result;
    private $host;
    private $usuario;
    private $senha;
    private $banco;
    public $tabela;
    public $campos;
    public $valores;
    public $condicao;
    private $link;
    public $retornoFunc;

    public function __construct()
    {
        $this->conexao();

    }

    private function conexao()
    {
        $this->host = "localhost";
        $this->banco = "bd_sorder";
        $this->usuario = "root";
        $this->senha = "";
        $this->link = mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco);
        return $this->link;
    }

    public function typeSQL($sql)
    {

        return mysqli_query($this->conexao(), $sql);

    }

    public function cadastrar($sql)
    {
        if ($this->typeSQL($sql)) {
            http_response_code(200);

            return json_encode(array('msg' => 'Cadastro efetuado com sucesso!',
                'id_cadastrado' => mysqli_insert_id($this->link)));

        } else {
            return json_encode(array('msg' => 'Erro! cadastrar(), Banco.php'));

        }

    }

    public function alterar($sql)
    {
        if ($this->typeSQL($sql)) {
            http_response_code(200);
            $this->retornoFunc = mysqli_insert_id($this->link);
            return json_encode(array('msg' => 'Cadastro efetuado com sucesso!',
                'id_cadastrado' => mysqli_insert_id($this->link)));

        } else {
            return json_encode(array('msg' => 'Erro! cadastrar(), Banco.php'));
        }

    }

    public function excluir($sql)
    {
        if ($this->typeSQL($sql)) {
            http_response_code(200);

            return json_encode(array('msg' => 'Cadastro efetuado com sucesso!',
                'id_cadastrado' => mysqli_insert_id($this->link)));

        } else {
            return json_encode(array('msg' => 'Erro! cadastrar(), Banco.php'));

        }

    }

    public function listar($filtro, $valorFiltro)
    {
        $campos = "";
        for ($a = 0; $a < count($this->campos); $a++) {
            if ($a < count($this->campos) - 1) {

                $campos .= $this->campos[$a] . ",";
            } else {
                $campos .= $this->campos[$a];
            }
        }
        $this->sql = "SELECT $campos FROM " . $this->tabela . " WHERE " . $filtro . "= " . $valorFiltro . " order by id asc";
        $this->query = mysqli_query($this->conexao(), $this->sql);
        $this->result = mysqli_affected_rows($this->conexao());
        if (mysqli_num_rows($this->query) > 0) {
//            echo "{\n";
            echo "{\"usuario\" : [\n        ";
            $j = 1;
            while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
                echo "{\n          \n        ";
                for ($i = 0; $i < count($this->campos); $i++) {
                    echo "";
                    echo
                        "      \"" . str_replace("_", " ", $this->campos[$i]) . "\": \"" . $r[$this->campos[$i]] . "\"";

                    if ($i < count($this->campos) - 1) {
                        echo ",\n        ";

                    } else {
                        echo " \n        ";
                    }

                }
                if (mysqli_num_rows($this->query) != $j) {
                    echo " },\n        ";
                } else {
                    echo " }\n        ";
                }
                $j++;

            }
            echo "\n   ]";
            echo "\n}";


        } else {
            echo "Nada";
        }
    }
}