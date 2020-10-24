<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Login;

class ErrorHandlingTest extends DuskTestCase
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
    public function testNonLoggedUserAccessNonExistentPath()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/asd')
                ->assertPathIs('/login');
        });
    }
    
    public function testLoggedUserAccessNonExistentPath()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->assertPathIs('/')
                ->on(new Home)
                ->visit('/asd')
                ->assertPathIs('/');
        });
    }
    
}
