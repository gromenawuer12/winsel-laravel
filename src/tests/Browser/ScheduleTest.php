<?php

namespace Tests\Browser;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Schedule;


class ScheduleTest extends DuskTestCase
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
    public function testScheduleSelectDay()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->waitForLocation('/')
                ->on(new Home)
                ->press('@schedule')
                ->waitForLocation('/tasks/schedule')
                ->on(new Schedule)
                ->script([
                    "document.getElementById('search').value = '2020-10-07';
                    $(search).click();",
                ]);
            $browser->waitForLocation('/tasks/schedule')
                ->assertPathIs('/tasks/schedule')
                ->assertVisible('@task');
        });
    }

    public function testScheduleNextDay()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->waitForLocation('/')
                ->on(new Home)
                ->press('@schedule')
                ->waitForLocation('/tasks/schedule')
                ->on(new Schedule);
            $next = $browser->value('@next');
            $browser->press('>')
                ->waitForLocation('/tasks/schedule')
                ->assertValue('@date', $next);
        });
    }

    public function testSchedulePreviousDay()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->waitForLocation('/')
                ->on(new Home)
                ->press('@schedule')
                ->waitForLocation('/tasks/schedule')
                ->on(new Schedule);
            $previous = $browser->value('@previous');
            $browser->press('<')
                ->waitForLocation('/tasks/schedule')
                ->assertValue('@date', $previous);
        });
    }
}
