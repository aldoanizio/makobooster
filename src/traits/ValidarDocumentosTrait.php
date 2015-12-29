<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */
namespace aldoanizio\makobooster\traits;


/**
 * ValidarDocumentosTrait
 *
 * @author     Aldo Anizio Lugão Camacho
 * @copyright  (c) 2015
 */
trait ValidarDocumentosTrait
{
    //---------------------------------------------
    // Class methods
    //---------------------------------------------

    /**
     * Validar CPF.
     *
     * @access  public
     * @param   string   $input  Input value
     * @return  boolean
     */
    public function validarCPF($input)
    {
        // Verifiva se o número digitado contém todos os digitos

        $cpf = preg_replace('/[^0-9]/', '', trim($input));

        // Sequencias não permitidas

        $sequenciasBloqueadas =
        [
            '00000000000', '11111111111', '22222222222', '33333333333', '44444444444',
            '55555555555', '66666666666', '77777777777', '88888888888', '99999999999',
        ];

        // Validar tamanho e sequências não permitidas

        if(strlen($cpf) <> 11 || in_array($cpf, $sequenciasBloqueadas))
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

    /**
     * Validar CNPJ.
     *
     * @access  public
     * @param   string   $input  Input value
     * @return  boolean
     */
    public function validarCNPJ($input)
    {
        // Iniciar variaveis

        $soma = 0;
        $multiplicador = 0;
        $multiplo = 0;

        // Filtrar caracteres

        $cnpj = preg_replace('/[^0-9]/', '', trim($input));

        // Validar tamanho do CNPJ

        if(strlen($cnpj) != 14)
        {
            return false;
        }

        // Validar valores repetidos no cnpj de 0 a 9 (ex. '00000000000000')

        for($i = 0; $i <= 9; $i++)
        {
            $repetidos = str_pad('', 14, $i);

            if($cnpj === $repetidos)
            {
                return false;
            }
        }

        // Validar a primeira parte do cnpj, sem os dígitos verificadores

        $parte1 = substr($cnpj, 0, 12);

        // Inverte a 1ª parte do cnpj para continuar a validação

        $parte1_invertida = strrev($parte1);

        // Percorrendo a parte invertida para obter o fator de calculo do 1º dígito verificador

        for($i = 0; $i <= 11; $i++)
        {
            $multiplicador = ($i == 0) || ($i == 8) ? 2 : $multiplicador;

            $multiplo = ($parte1_invertida[$i] * $multiplicador);

            $soma += $multiplo;

            $multiplicador++;
        }

        // Obtendo o 1º dígito verificador

        $rest = $soma % 11;

        $dv1 = ($rest == 0 || $rest == 1) ? 0 : 11 - $rest;

        // Pega a primeira parte do cnpj concatenando com o 1º dígito obtido

        $parte1 .= $dv1;

        // Mais uma vez inverte a 1ª parte do cnpj para continuar a validação

        $parte1_invertida = strrev($parte1);

        $soma = 0;

        // Mais uma vez percorre a parte invertida para obter o fator de calculo do 2º dígito verificador

        for($i = 0; $i <= 12; $i++)
        {
            $multiplicador = ($i == 0) || ($i == 8) ? 2 : $multiplicador;

            $multiplo = ($parte1_invertida[$i] * $multiplicador);

            $soma += $multiplo;

            $multiplicador++;
        }

        // Obter o 2º dígito verificador

        $rest = $soma % 11;

        $dv2 = ($rest == 0 || $rest == 1) ? 0 : 11 - $rest;

        // Compara se os dígitos obtidos são iguais aos informados (ou a segunda parte do cnpj)

        return ($dv1 == $cnpj[12] && $dv2 == $cnpj[13]) ? true : false;
    }
}