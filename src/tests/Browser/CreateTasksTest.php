<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Create;

class CreateTasksTest extends DuskTestCase
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
    public function testCreateTaskSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->waitForLocation('/')
                ->on(new Home)
                ->press('@newtask')
                ->waitForLocation('/create')
                ->on(new Create)
                ->value('@start', '2020-10-10T11:11:11')
                ->value('@duration', '01:01:01')
                ->select('@taskType', 'Work')
                ->type('@description', 'Hello')
                ->press('Create')
                ->waitForLocation('/')
                ->assertVisible('#task-11');
        });
    }

    public function testCreateTaskFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->waitForLocation('/')
                ->on(new Home)
                ->press('@newtask')
                ->waitForLocation('/create')
                ->on(new Create)
                ->script(
                    "document.getElementById('start').type = 'text';
                    document.getElementById('duration').type = 'text';
                    document.getElementById('taskType').options[0].value = 'fail';"
                );
            $browser->type('@start', 'fail')
                ->type('@duration', 'fail')
                ->value('@description', '<>!_-')
                ->press('Create')
                ->assertVisible('#errorstart')
                ->assertVisible('#errorduration')
                ->assertVisible('#errortaskType')
                ->assertVisible('#errordescription');
        });
    }

    public function testCreateTaskEmpty()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->waitForLocation('/')
                ->on(new Home)
                ->press('@newtask')
                ->waitForLocation('/create')
                ->on(new Create)
                ->value('@start', '')
                ->value('@duration', '')
                ->value('@taskType', '')
                ->type('@description', '')
                ->press('Create')
                ->assertVisible('#errorstart')
                ->assertVisible('#errorduration')
                ->assertVisible('#errortaskType')
                ->assertVisible('#errordescription');
        });
    }

    public function testCancelCreateTask()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->waitForLocation('/')
                ->on(new Home)
                ->press('@newtask')
                ->waitForLocation('/create')
                ->on(new Create)
                ->press('@cancel')
                ->assertPathIs('/');
        });
    }
}
