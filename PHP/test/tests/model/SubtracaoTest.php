<?php

namespace Elvis\Test\tests\model;

use Elvis\Test\model\Subtracao;
use PHPUnit\Framework\TestCase;

class SubtracaoTest extends TestCase
{
    // public function assertPreConditions()
    // {
    //     $this->assertTrue(
    //         class_exists('Elvis/Test/model/Subtracao')
    //     );
    // }

    public function testSubtrair()
    {
        $sub = new Subtracao();
        $sub->setNum(20);
        $sub->setNum2(10);

        self::assertEquals(10, $sub->subtrair());
        $sub = new Subtracao();
        $sub->setNum(100);
        $sub->setNum2(10);

        self::assertEquals(90, $sub->subtrair());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parametro nao informado   
     */
    public function testValidaSeValoresNaoForemPassados()
    {
        $sub = new Subtracao();
        $sub->setNum(100);
        $sub->setNum2('');

    }
}