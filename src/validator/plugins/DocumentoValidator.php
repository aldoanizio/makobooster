<?php

/**
 * @copyright  Aldo Anizio Lugão Camacho
 * @license    http://www.makoframework.com/license
 */
namespace aldoanizio\makobooster\validator\plugins;

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

    use \aldoanizio\makobooster\traits\ValidarDocumentosTrait;

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
     * @param   string   $input  Input value
     * @return  boolean
     */
    public function validate($input)
    {
        return ($this->validarCPF($input) == true || $this->validarCNPJ($input) == true);
    }
}