<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $attrubutes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];
        # Post project data and redirect
        $this->post('/projects', $attrubutes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attrubutes);

        $this->get('/projects')->assertSee($attrubutes['title']);
    }

     /** @test */
    public function a_project_requires_a_title()
    {
        $attrubutes = factory('App\Project')->raw(['title'=>'']);
        $this->post('/projets', $attrubutes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {    $attrubutes = factory('App\Project')->raw(['description'=>'']);
        $this->post('/projets', $attrubutes)->assertSessionHasErrors('description ');
    }


        /** @test */
    public function a_user_can_view_project()
    {   
        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();

        $this->get('/projects/' . $project->id)
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

}
