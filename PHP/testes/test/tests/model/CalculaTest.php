<?php

namespace Elvis\Test\tests\model;

use Elvis\Test\Model\Calcula;
use PHPUnit\Framework\TestCase;

class CalculaTest extends TestCase
{

       
    public function testSomaValores()
    {
        // Act - When
        $clc = new Calcula();

        // Assert - Then
        self::assertEquals(3,  $clc->Soma(1, 2));
    }
}
