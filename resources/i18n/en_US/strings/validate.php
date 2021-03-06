<?php

//---------------------------------------------
// Language file used by mako\Validate
//---------------------------------------------

return
[
    /**
     * Rule error messages.
     */

    'cpf'                            => 'The %1$s field must contain a valid CPF number.',
    'cnpj'                           => 'The %1$s field must contain a valid CNPJ number.',
    'cpf_cnpj'                       => 'The %1$s field must contain a valid CPF or CNPJ number.',
    'config_exists'                  => 'The %1$s doesn\'t exist.',
    'less_than_field'                => 'The value of the %1$s field must be less than %2$s field value.',
    'less_than_or_equal_to_field'    => 'The value of the %1$s field must be less than or equal to %2$s field value.',
    'greater_than_field'             => 'The value of the %1$s field must be greater than %2$s field value.',
    'greater_than_or_equal_to_field' => 'The value of the %1$s field must be greater than or equal to %2$s field value.',
    'between_fields'                 => 'The value of the %1$s field must be between the value of the fields %2$s and %3$s.',
    'unique'                         => 'The %1$s must be unique.',
    'exists'                         => 'The %1$s doesn\'t exist.',
    'min_age'                        => 'The value of the %1$s field must contain a date less than or equal to %2$s years old.',
    'max_age'                        => 'The value of the %1$s field must contain a date greater than or equal to %2$s years old.',
    'exact_age'                      => 'The value of the %1$s field must contain a date equal to %2$s years old.',

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