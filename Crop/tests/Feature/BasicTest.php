<?php

namespace Tests\Feature;
use App\Box;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicTest extends TestCase
{

    public function testHasItemInBox()
    {
        $box = new Box(['cat', 'toy', 'torch']);

        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('ball'));
    }

}
