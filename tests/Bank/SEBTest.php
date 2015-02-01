<?php

namespace byrokrat\banking\Bank;

/**
  * @covers \byrokrat\banking\Bank\SEB
*/
class SEBTest extends AccountNumberTestCase
{
    public function getParserName()
    {
        return 'SEB';
    }

    public function getBankName()
    {
        return 'SEB';
    }

    public function invalidStructureProvider()
    {
        return [
            ['5000,111111'],
            ['5000,11111'],
            ['5000,11111111'],
            ['5000,0000001111111']
        ];
    }

    public function invalidClearingProvider()
    {
        return [
            ['4999,1111111'],
            ['6000,1111111'],
            ['9119,1111111'],
            ['9125,1111111'],
            ['9129,1111111'],
            ['9150,1111111']
        ];
    }

    public function invalidCheckDigitProvider()
    {
        return [
            ['5000,1111111'],
            ['5681,0047150'],
            ['5102,0158750'],
            ['5624,0179270'],
            ['5011,0137390'],
            ['5169,0027450'],
            ['5007,0042700'],
            ['5502,0038521'],
            ['5504,0017150'],
            ['5624,0017790']
        ];
    }

    public function validProvider()
    {
        return [
            ['5000,1111116'],
            ['5000,000001111116'],
            ['5681,0047158'],
            ['5102,0158751'],
            ['5624,0179272'],
            ['5011,0137396'],
            ['5169,0027452'],
            ['5007,0042705'],
            ['5502,003852-0'],
            ['5504,001715-4'],
            ['5624,001779-5']
        ];
    }
}