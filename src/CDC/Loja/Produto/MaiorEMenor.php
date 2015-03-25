<?php
namespace CDC\Loja\Produto;

use CDC\Loja\Carrinho\CarrinhoDeCompras;

/**
 * Description of MaiorEMenor
 *
 * @author bdouglas
 */
class MaiorEMenor
{
    private $maior;
    private $menor;
    
    public function encontra(CarrinhoDeCompras $carrinho) 
    {
        foreach ($carrinho->getProdutos() as $produto) {
            if(empty($this->menor) || $produto->getValorUnitario() < $this->menor->getValorUnitario())
                $this->menor = $produto;
            
            if(empty($this->maior) || $produto->getValorUnitario() > $this->maior->getValorUnitario())
                $this->maior = $produto;
        }
        
    }
    
    public function getMaior()
    {
        return $this->maior;
    }

    public function getMenor()
    {
        return $this->menor;
    }

}
