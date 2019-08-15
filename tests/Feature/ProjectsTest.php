<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
	use WithFaker, RefreshDatabase;

	public function setup() : void
	{
		parent::setup();
		$this->attributes = factory('App\Project')->raw();
	}

    public function testUserCanCreateAProject()
    {
		$this->withoutExceptionHandling();

        $this->post('/projects', $this->attributes)->assertRedirect('/projects');

		$this->assertDatabaseHas('projects', $this->attributes);

		$this->get('/projects')->assertSee($this->attributes['title']);
	}
	
	public function testAProjectRequiresATitle()
	{
		$this->attributes['title'] = '';
		$this->post('/projects', $this->attributes)->assertSessionHasErrors('title');
	}

	public function testAProjectRequiresADescription()
	{
		$this->attributes['description'] = '';
		$this->post('/projects', $this->attributes)->assertSessionHasErrors('description');
	}
}
