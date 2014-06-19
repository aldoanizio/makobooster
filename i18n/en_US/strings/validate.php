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
    'config_exists'                  => 'The %1$s doesn\'t exist.',
    'less_than_field'                => 'The value of the %1$s field must be less than %2$s field value.',
    'less_than_or_equal_to_field'    => 'The value of the %1$s field must be less than or equal to %2$s field value.',
    'greater_than_field'             => 'The value of the %1$s field must be greater than %2$s field value.',
    'greater_than_or_equal_to_field' => 'The value of the %1$s field must be greater than or equal to %2$s field value.',


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