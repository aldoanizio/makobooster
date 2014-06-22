<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace makobooster\validator\plugins;

use \mako\database\ConnectionManager;

/**
 * Database exists plugin.
 *
 * @author  Aldo Anizio Lugão Camacho
 */

class DatabaseExistsValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
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

    protected $ruleName = 'exists';

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

        // Additional clauses

        for($i = 2; $i < count($parameters); $i++)
        {
            // Explode clauses

            list($field, $clauses) = explode('(', $parameters[$i], 2);

            // Explode clauses

            list($conditional, $value) = explode(':', rtrim($clauses, ')'), 2);

            // Perform query

            $query->where($field, $conditional, $value);
        }

        return ($query->count() != 0);
    }
}