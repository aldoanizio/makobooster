<?php

/**
 * Register validators
 *
 */

$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\CPFValidator);
$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\CNPJValidator);
$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\ConfigExistsValidator($this->config));
$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\BetweenFieldsValidator($container->get('request')));
$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\LessThanFieldValidator($container->get('request')));
$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\LessThanOrEqualToFieldValidator($container->get('request')));
$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\GreaterThanFieldValidator($container->get('request')));
$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\GreaterThanOrEqualToFieldValidator($container->get('request')));