<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_open_tasks_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
        $response->assertViewHas(['tasks']);
    }

    public function test_can_open_tasks_create_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();

        $this->actingAs($user);

        $response = $this->get(route('tasks.create'));
        $response->assertStatus(200);
        $response->assertViewIs('tasks.create');
    }

    public function test_can_open_tasks_edit_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $task = Task::factory()->create();

        $response = $this->get(route('tasks.edit', $task));
        $response->assertStatus(200);
        $response->assertViewIs('tasks.edit');
    }

    public function test_add_a_new_task()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $task = Task::factory()->create();

        $this->followingRedirects();
        $response = $this->post(route('tasks.store', [
            'title' => 'Something',
            'content' => 'Something'
        ]));

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => $task->title,
            'content' => $task->content
        ]);
    }

    public function test_delete_task()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $task = Task::factory()->create();

        $this->followingRedirects();
        $response = $this->delete(route('tasks.destroy', $task));

        $response->assertStatus(200);
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id
        ]);
    }

    public function test_update_task()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $task = Task::factory()->create();

        $this->followingRedirects();
        $response = $this->put(route('tasks.update', $task), [
            'title' => 'Something',
            'content' => 'Something'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Something',
            'content' => 'Something'
        ]);
    }

    public function test_mark_task_as_completed()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $task = Task::factory()->create();

        $this->followingRedirects();

        $response = $this->post(route('tasks.complete', $task));

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'completed_at' => now()
        ]);
    }
}
