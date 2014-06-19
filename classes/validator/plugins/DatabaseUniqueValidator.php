<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace makobooster\validator\plugins;

use \mako\database\ConnectionManager;

/**
 * Database unique plugin.
 *
 * @author  Aldo Anizio Lugão Camacho
 */

class DatabaseUniqueValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
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

	protected $ruleName = 'unique';

	/**
	 * Connection manager instance.
	 *
	 * @var \mako\database\ConnectionManager
	 */

	protected $connectionManager;

    //---------------------------------------------
    // Class constructor, destructor etc ...
    //---------------------------------------------

	/**
	 * Constructor.
	 *
	 * @access  public
	 * @param   \mako\database\ConnectionManager  $connectionManager  Connection manager instance
	 */

	public function __construct(ConnectionManager $connectionManager)
	{
		$this->connectionManager = $connectionManager;
	}

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
		$query = $this->connectionManager->builder()->table($parameters[0])->where($parameters[1], '=', $input);

		// Ignore a given value

		if(isset($parameters[2]) && ($parameters[2] !== 'NULL'))
		{
			$query->where($parameters[1], '!=', $parameters[2]);
		}

		// Additional clauses

		for($i = 3; $i < count($parameters); $i++)
		{
			// Explode clauses

			list($field, $clauses) = explode('(', $parameters[$i], 2);

			// Explode clauses

			list($conditional, $value) = explode(':', rtrim($clauses, ')'), 2);

			// Perform query

			$query->where($field, $conditional, $value);
		}

		return ($query->count() == 0);
	}
}