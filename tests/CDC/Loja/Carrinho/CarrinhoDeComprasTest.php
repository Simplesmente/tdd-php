<?php
namespace CDC\Loja\Carrinho;

use CDC\Loja\Test\TestCase,
 CDC\Loja\Carrinho\MaiorPreco,
 CDC\Loja\Carrinho\CarrinhoDeCompras,
 CDC\Loja\Produto\Produto;

/**
 * Description of MaiorPrecoTest
 *
 * @author bdouglas
 */
class CarrinhoDeComprasTest extends TestCase
{
    
    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $carrinho = new CarrinhoDeCompras();
        $valor = $carrinho->getMaior();
        
        $this->assertEquals(0, $valor, null, 0.00001);
    }
    
    public function testDeveRetornarValorDoItemSeCarrinhoCom1Elemento()
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona(new Produto('Geladeira', 450.0));
        $valor = $carrinho->getMaior();
        
        $this->assertEquals(450.0, $valor, null, 0.0001);
    }
    
    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosElementos()
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona(new Produto("Geladeira", 450.0));
        $carrinho->adiciona(new Produto("Microondas", 300.0, 2));
        $carrinho->adiciona(new Produto("Cama", 500.0));
        
        $valor = $carrinho->getMaior();
        
        $this->assertEquals(600.0, $valor, null, 0.0001);
    }
    
}
