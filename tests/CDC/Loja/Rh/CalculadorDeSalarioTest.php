<?php
namespace CDC\Loja\Rh;

require './vendor/autoload.php';

use PHPUnit_Framework_TestCase as PHPUnit;
use CDC\Loja\Rh\Funcionario,
    CDC\Loja\Rh\TabelaCargos,
    CDC\Loja\Rh\CalculadorDeSalario;

/**
 * Description of CalculadorDeSalarioTest
 *
 * @author bdouglas
 */
class CalculadorDeSalarioTest extends PHPUnit
{
    
    public function testCalculaSalarioDesenvolvedoresAbaixoDoLimite()
    {
        $calculadora = new CalculadorDeSalario();
        $desenvolvedor = new Funcionario("Breno Douglas", 1500.0, TabelaCargos::DESENVOLVEDOR);
        
        $salario = $calculadora->calculaSalario($desenvolvedor);
        
        $this->assertEquals(1500 * 0.9, $salario, null, 0.00001);
    }
    
    public function testCalculaSalarioDesenvolvedoresAcimaDoLimite()
    {   
        $calculadora = new CalculadorDeSalario();
        $funcionario = new Funcionario("Breno Douglas", 4000.0, TabelaCargos::DESENVOLVEDOR);
        
        $salario = $calculadora->calculaSalario($funcionario);
        
        $this->assertEquals($funcionario->getSalario() * 0.8, $salario, null, 0.00001);
    }
    
    public function testCalculaSalarioDbaAbaixoDoLimite()
    {
        $calculadora = new CalculadorDeSalario();
        $funcionario = new Funcionario("Breno Douglas", 500.0, TabelaCargos::DBA);
        
        $salario = $calculadora->calculaSalario($funcionario);
        
        $this->assertEquals($funcionario->getSalario() * 0.85, $salario, null, 0.00001);
    }
}
