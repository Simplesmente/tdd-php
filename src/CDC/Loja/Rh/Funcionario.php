<?php
namespace CDC\Loja\Rh;

/**
 * Description of Funcionario
 *
 * @author Breno Douglas
 */
class Funcionario
{
    protected $nome;
    protected $salario;
    protected $cargo;
    
    public function __construct($nome, $salario, $cargo)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->cargo = $cargo;
    }
    
    public function getNome()
    {
        return $this->nome;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function setSalario($salario)
    {
        $this->salario = $salario;
        return $this;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
        return $this;
    }

}
