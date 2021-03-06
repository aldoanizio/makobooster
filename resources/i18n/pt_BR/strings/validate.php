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
    'cpf_cnpj'                       => 'O valor do campo %1$s deve conter um número de CPF ou CNPJ válido.',
    'config_exists'                  => 'O conteúdo do campo %1$s não existe.',
    'less_than_field'                => 'O valor do campo %1$s deve ser menor que o campo %2$s.',
    'less_than_or_equal_to_field'    => 'O valor do campo %1$s deve ser menor ou igual ao campo %2$s.',
    'greater_than_field'             => 'O valor do campo %1$s deve ser maior que o campo %2$s.',
    'greater_than_or_equal_to_field' => 'O valor do campo %1$s deve ser maior ou igual ao campo %2$s.',
    'between_fields'                 => 'O valor do campo %1$s deve estar entre os valores dos campos %2$s e %3$s.',
    'unique'                         => 'O conteúdo do campo %1$s já existe.',
    'exists'                         => 'O conteúdo do campo %1$s não existe.',
    'min_age'                        => 'O valor do campo %1$s deve conter uma data maior ou igual a %2$s anos.',
    'max_age'                        => 'O valor do campo %1$s deve conter uma data menor ou igual a %2$s anos.',
    'exact_age'                      => 'O valor do campo %1$s deve conter uma data igual a %2$s anos.',

    /**
     * Custom overrides.
     */

    'overrides' =>
    [
        'fieldnames' =>
        [
            'cpf'      => 'CPF',
            'cnpj'     => 'CNPJ',
            'cpf_cnpj' => 'CPF/CNPJ',
        ],

        'messages' =>
        [

        ],
    ],
];