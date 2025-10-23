<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentSendValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testComment()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
