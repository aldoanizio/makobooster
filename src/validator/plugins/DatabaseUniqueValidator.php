<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace aldoanizio\makobooster\validator\plugins;

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
     * @param   string   $input   Input
     * @param   string   $table   Table name
     * @param   string   $column  Column name
     * @param   string   $value   Allowed value
     * @param   array    $conditional  (optional) Query conditionals
     * @return  boolean
     */

    public function validate($input, $table, $column, $value = null, $conditionals = [])
    {
        $query = $this->connectionManager->builder()->table($table)->where($column, '=', $input);

        // Ignore a given value

        if(!empty($value))
        {
            $query->where($column, '!=', $value);
        }

        // Additional clauses

        foreach($conditionals as $conditional)
        {
            // Explode clauses

            list($field, $conditional, $value) = explode(' ', $conditional);

            // Perform query

            $query->where($field, $conditional, $value);
        }

        return ($query->count() == 0);
    }
}