<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterationTest extends TestCase
{


    public function an_email_can_be_entered()
    {
        $this->post('/job', [
            'email' => 'abc@abc.com'
        ]);
        $this->assertDatabaseCount('job_entries', 1);


    }
}
