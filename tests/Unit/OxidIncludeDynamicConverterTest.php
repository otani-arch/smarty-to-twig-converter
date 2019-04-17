<?php

namespace sankar\ST\Tests\Unit;

use PHPUnit\Framework\TestCase;
use toTwig\Converter\OxidIncludeDynamicConverter;

/**
 * Class OxidIncludeDynamicConverterTest
 *
 * @author Tomasz Kowalewski (t.kowalewski@createit.pl)
 */
class OxidIncludeDynamicConverterTest extends TestCase
{

    /** @var OxidIncludeDynamicConverter */
    protected $converter;

    public function setUp()
    {
        $this->converter = new OxidIncludeDynamicConverter();
    }

    /**
     * @covers       \toTwig\Converter\OxidIncludeDynamicConverter::convert
     *
     * @dataProvider Provider
     *
     * @param $smarty
     * @param $twig
     */
    public function testThatAssignIsConverted($smarty, $twig)
    {
        // Test the above cases
        $this->assertSame(
            $twig,
            $this->converter->convert($smarty)
        );
    }

    /**
     * @return array
     */
    public function Provider()
    {
        return [
            // Basic usage
            [
                "[{oxid_include_dynamic file=\"form/formparams.tpl\"}]",
                "{% include_dynamic \"form/formparams.html.twig\" %}"
            ],
            // Example from OXID
            [
                "[{oxid_include_dynamic file=\"widget/product/compare_links.tpl\" testid=\"_`\$iIndex`\" type=\"compare\" aid=\$product->oxarticles__oxid->value anid=\$altproduct in_list=\$product->isOnComparisonList() page=\$oView->getActPage()}]",
                "{% include_dynamic \"widget/product/compare_links.html.twig\" with {testid: \"_`\$iIndex`\", type: \"compare\", aid: product.oxarticles__oxid.value, anid: altproduct, in_list: product.isOnComparisonList(), page: oView.getActPage()} %}"
            ],
            // With spaces
            [
                "[{ oxid_include_dynamic file=\"form/formparams.tpl\" }]",
                "{% include_dynamic \"form/formparams.html.twig\" %}"
            ],
        ];
    }

    /**
     * @covers \toTwig\Converter\OxidIncludeDynamicConverter::getName
     */
    public function testThatHaveExpectedName()
    {
        $this->assertEquals('oxid_include_dynamic', $this->converter->getName());
    }

    /**
     * @covers \toTwig\Converter\OxidIncludeDynamicConverter::getDescription
     */
    public function testThatHaveDescription()
    {
        $this->assertNotEmpty($this->converter->getDescription());
    }
}