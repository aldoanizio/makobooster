<?php

//---------------------------------------------
// Language file used by mako\Validate
//---------------------------------------------

return
[
	/**
	 * Rule error messages.
	 */

    'cpf'           => 'The %1$s field must contain a valid CPF number.',
	'cnpj'          => 'The %1$s field must contain a valid CNPJ number.',
	'config_exists' => 'The %1$s doesn\'t exist.',


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