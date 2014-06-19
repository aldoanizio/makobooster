<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace makobooster\validator\plugins;

use mako\http\Request;

/**
 * Validador Between Fields.
 *
 * @author  Aldo Anizio Lugão Camacho
 */

class BetweenFieldsValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
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

    protected $ruleName = 'between_fields';

    /**
     * Request instance.
     *
     * @var mako\http\Request
     */

    protected $request;

    //---------------------------------------------
    // Class constructor, destructor etc ...
    //---------------------------------------------

    /**
     * Constructor.
     *
     * @access  public
     * @param   mako\http\Request  $request  Request instance
     */

    public function __construct(Request $request)
    {
        $this->request = $request;
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
        return ($input >= $this->request->post($parameters[0]) && $input <= $this->request->post($parameters[0]));
    }
}