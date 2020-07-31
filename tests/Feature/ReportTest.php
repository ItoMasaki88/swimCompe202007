<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * @test
     */
    public function web_topにGETメソッドでアクセスできる()
    {
        $response = $this->get('/top');

        $response->assertStatus(200);
    }

}
