<?php

namespace Tests\Unit;

use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function it_runs()
    {
        $this->assertInstanceOf(Contact::class, new Contact());
    }

    /**
     * @test
     */
    public function it_returns_model_fields()
    {
        $this->assertNotEmpty(Contact::getFields());
    }
}
