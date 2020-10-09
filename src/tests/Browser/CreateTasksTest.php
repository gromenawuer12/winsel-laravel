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
                //->type('@start', "2020-10-09T21:25:49");
                ->script("document.querySelector('input[name=start]').value = '2020-10-09T21:25:49'");
            $browser->type('@duration', "01:34:41")
                ->select('@taskType', 'work')
                ->type('@description', 'This is a new task')
                ->press('Create')
                ->assertPathIs('/')
                ->on(new Home)
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
                ->type('@start', 'fail')
                ->type('@duration', 'fail')
                ->select('@taskType', 'fail')
                ->type('@description', '')
                ->press('Create')
                ->assertVisible('#errorstart')
                ->assertVisible('#errorduration')
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
                ->type('@start', '')
                ->type('@duration', '')
                ->select('@taskType', '')
                ->type('@description', '')
                ->press('Create')
                ->assertVisible('#errorstart')
                ->assertVisible('#errorduration')
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
