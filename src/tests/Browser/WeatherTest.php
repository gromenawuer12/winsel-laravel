<?php

namespace Tests\Browser;

use App\Models\Task;
use Carbon\Carbon;
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
    public function testWeatherTaskFail6DaysMore()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->waitForLocation('/')
                ->on(new Home)
                ->press('@newtask')
                ->waitForLocation('/tasks/create')
                ->on(new Create)
                ->value('@start', Carbon::now()->addDays(6)->format('Y-m-d\TH:i:s'))
                ->value('@duration', '01:01:01')
                ->select('@taskType', 'Work')
                ->type('@description', 'Hello')
                ->screenshot('add1')
                ->press('@create')
                ->waitForLocation('/')
                ->assertVisible('#task-11');
        });
        if (empty(Task::findOrFail(11)->weather_task_id)) {
            echo "Worked!!";
        } else {
            echo "Error!!";
        }
    }

    public function testWeatherTaskFailLessNow()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->waitForLocation('/')
                ->on(new Home)
                ->press('@newtask')
                ->waitForLocation('/tasks/create')
                ->on(new Create)
                ->value('@start', Carbon::now()->subDays(6)->format('Y-m-d\TH:i:s'))
                ->value('@duration', '01:01:01')
                ->select('@taskType', 'Work')
                ->type('@description', 'Hello')
                ->press('@create')
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
