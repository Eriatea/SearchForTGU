<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProjectTest extends TestCase
{

    public function test_example_test()
    {
       $responce=$this->get('/');
       $responce->assertOk();
    }

    public function test_example_test_2()
    {
       $responce=$this->get('/events');
       $responce->assertOk();
    }


}
