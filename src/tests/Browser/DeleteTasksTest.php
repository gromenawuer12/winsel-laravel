<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Home;

class DeleteTasksTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCancelDeleteTask()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->assertPathIs('/')
                ->on(new Home)
                ->assertVisible('#task-1') 
                ->press('@deleteTask')
                ->waitForText('Are you sure')
                ->press('@cancel')
                ->assertVisible('#task-1');
        });
    }

    public function testDeleteTask()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->assertPathIs('/')
                ->on(new Home)
                ->assertVisible('#task-1') 
                ->press('@deleteTask')
                ->waitForText('Are you sure')
                ->press('@delete')
                ->assertMissing('#task-1');
        });
    }
}
