<?php

namespace ElvisLeite\RecordSetDatabase\Tests;

use ElvisLeite\RecordSetDatabase\Connection;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    public function testsetConnect()
    {   
        parent::assertIsString(Connection::setConnect());      
    }
}
