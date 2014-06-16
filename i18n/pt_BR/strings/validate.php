<?php

//---------------------------------------------
// Language file used by mako\Validate
//---------------------------------------------

return
[
	/**
	 * Rule error messages.
	 */

	'cpf'           => 'O valor do campo %1$s deve conter um número de CPF válido.',
	'cnpj'          => 'O valor do campo %1$s deve conter um número de CNPJ válido.',
	'config_exists' => 'O conteúdo do campo %1$s não existe.',


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