<?php
namespace CDC\Loja\Carrinho;

use CDC\Loja\Produto\Produto;
use ArrayObject;

/**
 * Description of CarrinhoDeCompras
 *
 * @author Breno Douglas
 */
class CarrinhoDeCompras
{
    private $produtos;
    
    public function __construct()
    {
        $this->produtos = new ArrayObject();
    }
    
    public function adiciona(Produto $produto) 
    {
        $this->produtos->append($produto);
        return $this;
    }
    
    public function getProdutos()
    {
        return $this->produtos;
    }
    
    public function getMaior() 
    {
        if(count($this->produtos) === 0)
            return 0;
        
        $maiorValor = $this->produtos[0]->getValorTotal();
        
        foreach ($this->produtos as $produto) {
            if($maiorValor < $produto->getValorTotal())
                $maiorValor = $produto->getValorTotal();
        }
        
        return $maiorValor;
    }
    
}