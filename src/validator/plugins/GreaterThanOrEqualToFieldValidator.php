<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace aldoanizio\makobooster\validator\plugins;

use mako\http\Request;

/**
 * Validador Greater Than Or Equal To Field.
 *
 * @author  Aldo Anizio Lugão Camacho
 */

class GreaterThanOrEqualToFieldValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
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

    protected $ruleName = 'greater_than_or_equal_to_field';

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
     * @param   string   $input  Input value
     * @param   array    $field  Comparison field
     * @return  boolean
     */

    public function validate($input, $field)
    {
        if($this->request->post($field))
        {
            return ($input >= $this->request->post($field));
        }

        return true;
    }
}