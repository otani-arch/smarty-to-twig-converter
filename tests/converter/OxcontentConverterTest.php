<?php

namespace sankar\ST\Tests\Converter;

use toTwig\Converter\OxcontentConverter;

/**
 * Class OxcontentConverterTest
 *
 * @author Tomasz Kowalewski (t.kowalewski@createit.pl)
 */
class OxcontentConverterTest extends AbstractConverterTest
{

    /** @var OxcontentConverter */
    protected $converter;

    public function setUp()
    {
        $this->converter = new OxcontentConverter();
    }

    /**
     * @covers       \toTwig\Converter\OxcontentConverter::convert
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
            $this->converter->convert($this->getFileMock(), $smarty)
        );
    }

    /**
     * @return array
     */
    public function Provider()
    {
        return [
            // Base usage
            [
                "[{oxcontent ident='oxregisteremail'}]",
                "{% include 'content::ident::oxregisteremail' %}"
            ],
            // With additional parameters
            [
                "[{oxcontent ident='oxregisteremail' field='customfield'}]",
                "{% include 'content::ident::oxregisteremail?field=customfield' %}"
            ],
            // Value converting and assign
            [
                "[{oxcontent ident='oxregisteremail' assign=\$var}]",
                "{% set var = include('content::ident::oxregisteremail') %}"
            ],
            // As assignment
            [
                "[{oxcontent ident='oxregisteremail' field='customfield' assign=\$var}]",
                "{% set var = include('content::ident::oxregisteremail?field=customfield') %}"
            ],
            // With spaces
            [
                "[{ oxcontent ident='oxregisteremail' }]",
                "{% include 'content::ident::oxregisteremail' %}"
            ],
        ];
    }

    /**
     * @covers \toTwig\Converter\OxcontentConverter::getName
     */
    public function testThatHaveExpectedName()
    {
        $this->assertEquals('oxcontent', $this->converter->getName());
    }

    /**
     * @covers \toTwig\Converter\OxcontentConverter::getDescription
     */
    public function testThatHaveDescription()
    {
        $this->assertNotEmpty($this->converter->getDescription());
    }
}
