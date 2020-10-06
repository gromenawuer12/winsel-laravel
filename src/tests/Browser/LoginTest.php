<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Home;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->assertPathIs('/homeController');
        });
    }
    public function testLoginFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', '')
                ->type('@password', '')
                ->press('Submit')
                ->assertVisible('#errorusername')
                ->assertVisible('#errorpassword');
        });
    }
    public function testLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->type('@username', 'winsel')
                ->type('@password', 'winsel')
                ->press('Submit')
                ->assertPathIs('/homeController')
                ->on(new Home)
                ->press('@logout')
                ->assertPathIs('/login');
        });
    }
}
