<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */
namespace makobooster\validator\plugins;

/**
 * Validador de CPF/CNPJ.
 *
 * @author  Aldo Anizio Lugão Camacho
 */
class DocumentoValidator extends \mako\validator\plugins\ValidatorPlugin implements \mako\validator\plugins\ValidatorPluginInterface
{
    //---------------------------------------------
    // Class traits
    //---------------------------------------------

    use \makobooster\traits\ValidarDocumentosTrait;

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
    protected $ruleName = 'cpf_cnpj';

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
        return ($this->validarCPF($input) == true || $this->validarCNPJ($input) == true);
    }
}