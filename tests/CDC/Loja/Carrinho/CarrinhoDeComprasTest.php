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
    private $carrinho;

    protected function setUp()
    {   
        $this->carrinho = new CarrinhoDeCompras();
        parent::setUp();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $valor = $this->carrinho->getMaior();
        
        $this->assertEquals(0, $valor, null, 0.00001);
    }
    
    public function testDeveRetornarValorDoItemSeCarrinhoCom1Elemento()
    {
        $this->carrinho->adiciona(new Produto('Geladeira', 450.0));
        $valor = $this->carrinho->getMaior();
        
        $this->assertEquals(450.0, $valor, null, 0.0001);
    }
    
    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosElementos()
    {
        $this->carrinho->adiciona(new Produto("Geladeira", 450.0));
        $this->carrinho->adiciona(new Produto("Microondas", 300.0, 2));
        $this->carrinho->adiciona(new Produto("Cama", 500.0));
        
        $valor = $this->carrinho->getMaior();
        
        $this->assertEquals(600.0, $valor, null, 0.0001);
    }

    public function testDeveAdicionarItens() 
    {
        $this->assertEmpty($this->carrinho->getProdutos());

        $produto = new Produto('Geladeira', 450.0);

        $this->carrinho->adiciona($produto);

        $totalProdutos = count($this->carrinho->getProdutos());
        $this->assertEquals(1, $totalProdutos);
        $this->assertEquals($produto, $this->carrinho->getProdutos()[0]);
    }
    
    public function testListaDeProdutos() 
    {
        $this->carrinho
             ->adiciona(new Produto('Geladeira', 450.00))
             ->adiciona(new Produto('Microondas', 100.00));

         $this->assertEquals(2, count($this->carrinho->getProdutos()));
         $this->assertEquals(450.00, $this->carrinho->getProdutos()[0]->getValorUnitario());
         $this->assertEquals(100.00, $this->carrinho->getProdutos()[1]->getValorUnitario());
    }
}
