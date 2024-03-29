<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectsController extends Controller
{
	public function index()
	{
		$projects = Project::all();
		return view('projects.index', compact('projects'));
	}

	public function store()
	{
		// validation
		request()->validate(
			[
				'title' => 'required',
				'description' => 'required',
			]
		);

		Project::create(request(['title', 'description']));

		return redirect('/projects');
	}
}
