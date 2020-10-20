<?php

namespace Tests\Browser;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Create;
use Illuminate\Support\Facades\Http;

class WeatherTest extends DuskTestCase
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
    public function testWeatherTaskSuccess()
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
                ->value('@start', '2020-10-20T00:00:00')
                ->value('@duration', '01:01:01')
                ->select('@taskType', 'Work')
                ->type('@description', 'Hello')
                ->press('Create')
                ->waitForLocation('/')
                ->assertVisible('#task-11');
        });
        if (Task::findOrFail(11)->weather_task_id) {
            echo "Worked!!";
        } else {
            echo "Error!!";
        }
    }

    public function testWeatherTaskFail()
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
                ->value('@start', '2010-10-10T00:00:00')
                ->value('@duration', '01:01:01')
                ->select('@taskType', 'Work')
                ->type('@description', 'Hello')
                ->press('Create')
                ->waitForLocation('/')
                ->assertVisible('#task-11');
        });

        if (empty(Task::findOrFail(11)->weather_task_id)) {
            echo "Worked!!";
        } else {
            echo "Error!!";
        }
    }
}
