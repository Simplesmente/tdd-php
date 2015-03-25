<?php

namespace CDC\Loja\Rh;

/**
 * Description of CalculadorDeSalario
 *
 * @author bdouglas
 */
class CalculadorDeSalario
{

    public function calculaSalario(Funcionario $funcionario)
    {
        if ($funcionario->getCargo() === TabelaCargos::DESENVOLVEDOR) {
            if ($funcionario->getSalario() > 3000)
                return $funcionario->getSalario() * 0.8;

            return $funcionario->getSalario() * 0.9;
        }
       
        return 425.0;
    }

}
