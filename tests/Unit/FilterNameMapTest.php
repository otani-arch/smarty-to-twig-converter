<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace toTwig\Tests\Unit;

use toTwig\FilterNameMap;
use PHPUnit\Framework\TestCase;

class FilterNameMapTest extends TestCase
{

    public function provider()
    {
        return [
            ['smartwordwrap', 'smart_wordwrap'],
            ['foo', 'foo']
        ];
    }

    /**
     * @param $nameToTranslate
     * @param $expected
     *
     * @covers       \toTwig\FilterNameMap::getConvertedFilterName
     * @dataProvider provider
     */
    public function testGetConvertedFilterName($nameToTranslate, $expected)
    {
        $actual = FilterNameMap::getConvertedFilterName($nameToTranslate);
        $this->assertEquals($expected, $actual);
    }
}
