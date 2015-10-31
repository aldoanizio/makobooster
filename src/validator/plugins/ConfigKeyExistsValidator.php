<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace aldoanizio\makobooster\validator\plugins;

use \mako\config\Config;

/**
 * Config exists plugin.
 *
 * @author Aldo Anizio Lugão Camacho
 */

class ConfigKeyExistsValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
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

    protected $ruleName = 'config_key_exists';

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
     * @param   \mako\core\Config  $config  Config instance
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
     * @param   string   $input   Input
     * @param   string   $config  Array key to match result
     * @return  boolean
     */

    public function validate($input, $config)
    {
        return (array_key_exists($input, $this->config->get($config)));
    }
}