<?php

/**
 * Register validators
 *
 */

$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\CPFValidator);
$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\CNPJValidator);
$container->get('validator')->registerPlugin(new \makobooster\validator\plugins\ConfigExistsValidator($this->config));