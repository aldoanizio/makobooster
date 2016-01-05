<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */

namespace aldoanizio\makobooster;


/**
 * Makobooster package.
 *
 * @author  Aldo Anizio Lugão Camacho
 */

class MakoboosterPackage extends \mako\application\Package
{
    /**
     * Package name.
     *
     * @var string
     */

    protected $packageName = 'aldoanizio/makobooster';

    /**
     * Package namespace.
     *
     * @var string
     */

    protected $fileNamespace = 'makobooster';

    /**
     * Gets executed at the end of the package boot sequence.
     *
     * @access  protected
     */

    protected function bootstrap()
    {
        $this->registerValidators();
    }

    /**
     * Register custom validators
     *
     * @access  private
     */
    private function registerValidators()
    {
        // Valitador instance

        $validator = $this->container->get('validator');

        // Database instance

        $database = $this->container->get('database');

        // Request instance

        $request = $this->container->get('request');

        // Config instance

        $config = $this->container->get('config');

        // Register validators

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\CPFValidator);

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\CNPJValidator);

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\DocumentoValidator);

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\ConfigExistsValidator($config));

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\ConfigKeyExistsValidator($config));

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\DatabaseExistsValidator($database));

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\DatabaseUniqueValidator($database));

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\BetweenFieldsValidator($request));

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\LessThanFieldValidator($request));

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\LessThanOrEqualToFieldValidator($request));

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\GreaterThanFieldValidator($request));

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\GreaterThanOrEqualToFieldValidator($request));

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\MinAgeValidator());

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\MaxAgeValidator());

        $validator->registerPlugin(new \aldoanizio\makobooster\validator\plugins\ExactAgeValidator());
    }
}