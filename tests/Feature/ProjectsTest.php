<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
	use WithFaker, RefreshDatabase;

    public function testUserCanCreateAProject()
    {
		$this->withoutExceptionHandling();
		
		$attributes = [
			'title' => $this->faker->sentence,
			'description' => $this->faker->paragraph,
		];

        $this->post('/projects', [

		]);

		$this->assertDatabaseHas('projects', $attributes);
    }
}
