<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class Schedule extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/tasks/schedule';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@search' => 'button[name=search]',
            '@task' => '#task-10',
            '@previous' => '#previous',
            '@next' => '#next',
        ];
    }
}
