<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace toTwig\Converter;

/**
 * Class OxpriceConverter
 */
class OxpriceConverter extends AbstractSingleTagConverter
{

    protected $name = 'oxprice';
    protected $description = "Convert smarty {oxprice} to twig function {{ format_price() }}";
    protected $priority = 100;
    protected $convertedName = 'format_price';
    protected $mandatoryFields = ['price'];
}
