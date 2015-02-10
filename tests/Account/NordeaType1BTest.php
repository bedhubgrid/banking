<?php

namespace byrokrat\banking\Account;

/**
 * @covers \byrokrat\banking\BaseAccount
 */
class NordeaType1BTest extends AccountNumberTestCase
{
    public function getFormatId()
    {
        return 'nordea_1b';
    }

    public function getClassName()
    {
        return '\byrokrat\banking\BaseAccount';
    }

    public function invalidStructureProvider()
    {
        return [
            ['4000,111111'],
            ['4000,11111'],
            ['4000,11111111'],
            ['4000,0000001111111'],
        ];
    }

    public function invalidClearingProvider()
    {
        return [
            ['3999,1234567'],
            ['5000,1234567'],
        ];
    }

    public function invalidCheckDigitProvider()
    {
        return [
            ['4000,1111111'],
        ];
    }

    public function validProvider()
    {
        return [
            ['4000, 1111112',      '4000', '', '111111', '2'],
            ['4000,000001111112',  '4000', '', '111111', '2'],
            ['4000,111111-2',      '4000', '', '111111', '2'],
            ['4000,00000111111-2', '4000', '', '111111', '2'],
        ];
    }
}
