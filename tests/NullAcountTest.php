<?php
/**
 * This file is part of ledgr/banking.
 *
 * Copyright (c) 2014 Hannes Forsgård
 *
 * ledgr/banking is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * ledgr/banking is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ledgr/banking.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace ledgr\banking;

class NullAccountTest extends \PHPUnit_Framework_TestCase
{
    public function testGetClearing()
    {
        $account = new NullAccount();
        $this->assertEquals('-', $account->getClearing());
    }

    public function testGetType()
    {
        $account = new NullAccount();
        $this->assertEquals('-', $account->getType());
    }

    public function testGetString()
    {
        NullAccount::setString('foobar');
        $account = new NullAccount();
        $this->assertEquals('foobar', (string)$account);
        $this->assertEquals('foobar', $account->getNumber());
        $this->assertEquals('foobar', $account->to16());
    }
}