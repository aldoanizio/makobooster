<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace makobooster\validator\plugins;

/**
 * Validador de CPF.
 *
 * @author  Aldo Anizio Lugão Camacho
 */

class CPFValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
{
    //---------------------------------------------
    // Class properties
    //---------------------------------------------

    /**
     * Package name.
     *
     * @var string
     */

    protected $packageName = 'makobooster';

    /**
     * Rule name.
     *
     * @var string
     */

    protected $ruleName = 'cpf';

    //---------------------------------------------
    // Class methods
    //---------------------------------------------

    /**
     * Validator.
     *
     * @access  public
     * @param   string   $input       Input
     * @param   array    $parameters  Parameters
     * @return  boolean
     */

    public function validate($input, $parameters)
    {
        // Verifiva se o número digitado contém todos os digitos

        $cpf = preg_replace("/[^0-9]/", '', trim($input));

        // Sequencias não permitidas

        $sequencias_bloqueadas =
        [
            '00000000000', '11111111111', '22222222222', '33333333333', '44444444444',
            '55555555555', '66666666666', '77777777777', '88888888888', '99999999999',
        ];

        // Validar tamanho e sequências não permitidas

        if(strlen($cpf) <> 11 || in_array($cpf, $sequencias_bloqueadas))
        {
            return false;
        }
        else
        {
            // Calcula os números para verificar se o CPF é verdadeiro

            for($t = 9; $t < 11; $t++)
            {
                for($d = 0, $c = 0; $c < $t; $c++)
                {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;

                if($cpf{$c} != $d)
                {
                    return false;
                }
            }

            return true;
        }
    }
}