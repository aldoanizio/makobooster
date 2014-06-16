<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace makobooster\validator\plugins;

use \mako\config\Config;

/**
 * Config exists plugin.
 *
 * @author Frederic G. Østby
 */

class ConfigExistsValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
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

    protected $ruleName = 'config_exists';

    /**
     * Config instance.
     *
     * @var \mako\core\Config
     */

    protected $config;

    //---------------------------------------------
    // Class constructor, destructor etc ...
    //---------------------------------------------

    /**
     * Constructor.
     *
     * @access  public
     * @param   \mako\core\Config $config Config instance
     */

    public function __construct(Config $config)
    {
        $this->config = $config;
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
        if(empty($parameters[1]) || $parameters[1] != true)
        {
            return (in_array($input, $this->config->get($parameters[0])));
        }
        else
        {
            return (array_key_exists($input, $this->config->get($parameters[0])));
        }
    }
}