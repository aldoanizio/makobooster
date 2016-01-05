<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace makobooster\validator\plugins;

use mako\utility\Time;

/**
 * Validador Exact Age.
 *
 * @author  Aldo Anizio Lugão Camacho
 */

class ExactAgeValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
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

    protected $ruleName = 'exact_age';

    //---------------------------------------------
    // Class methods
    //---------------------------------------------

    /**
     * Validator.
     *
     * @access  public
     * @param   string   $input       Input value
     * @param   array    $parameters  Parameters
     * @return  boolean
     */

    public function validate($input, $parameters)
    {
        // Check age

        if(!isset($parameters[0]))
        {
            return false;
        }

        $format = isset($parameters[1]) ? $parameters[1] : 'Y-m-d';

        if(($input = Time::createFromFormat($format, $input)) === false)
        {
            return false;
        }

        return ($input->getTimestamp() == Time::now()->modify("-{$parameters[0]} years")->getTimestamp());
    }
}