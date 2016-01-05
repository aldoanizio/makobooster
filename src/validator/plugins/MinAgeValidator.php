<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace aldoanizio\makobooster\validator\plugins;

use mako\chrono\Time;

/**
 * Validador Min Age.
 *
 * @author  Aldo Anizio Lugão Camacho
 */

class MinAgeValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
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

    protected $ruleName = 'min_age';

    //---------------------------------------------
    // Class methods
    //---------------------------------------------

    /**
     * Validator.
     *
     * @access  public
     * @param   string   $input   Input value
     * @param   int      $age     Minimal age value
     * @param   string   $format  (optional) Date format
     * @return  boolean
     */

    public function validate($input, $age, $format = 'Y-m-d')
    {
        if(($input = Time::createFromFormat($format, $input)) === false)
        {
            return false;
        }

        return ($input->getTimestamp() <= Time::now()->modify("-{$age} years")->getTimestamp());
    }
}