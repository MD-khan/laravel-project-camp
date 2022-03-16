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


}
