<?php
/**
 * Created by PhpStorm.
 * User: jskoczek
 * Date: 28/08/18
 * Time: 12:34
 */

namespace toTwig\Converter;

/**
 * Class InsertConverter
 */
class InsertConverter extends IncludeConverter
{

    protected $name = 'insert';
    protected $description = 'Convert smarty insert to twig include';

    protected $string = '{% include :template :with :vars %}';
    protected $attrName = 'name';

    /**
     * InsertConverter constructor.
     */
    public function __construct()
    {
        parent::__construct();

        // [{insert other stuff}]
        $this->pattern = $this->getOpeningTagPattern('insert');
    }
}