<?php

//---------------------------------------------
// Language file used by mako\Validate
//---------------------------------------------

return
[
    /**
     * Rule error messages.
     */

    'cpf'                            => 'O valor do campo %1$s deve conter um número de CPF válido.',
    'cnpj'                           => 'O valor do campo %1$s deve conter um número de CNPJ válido.',
    'config_exists'                  => 'O conteúdo do campo %1$s não existe.',
    'less_than_field'                => 'O valor do campo %1$s deve ser menor que o campo %2$s.',
    'less_than_or_equal_to_field'    => 'O valor do campo %1$s deve ser menor ou igual ao campo %2$s.',
    'greater_than_field'             => 'O valor do campo %1$s deve ser maior que o campo %2$s.',
    'greater_than_or_equal_to_field' => 'O valor do campo %1$s deve ser maior ou igual ao campo %2$s.',
    'between_fields'                 => 'O valor do campo %1$s deve estar entre os valores dos campos %2$s e %3$s.',


    /**
     * Custom overrides.
     */

    'overrides' =>
    [
        'fieldnames' =>
        [
            'cpf'  => 'CPF',
            'cnpj' => 'CNPJ',
        ],

        'messages' =>
        [

        ],
    ],
];