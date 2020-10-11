<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class Home extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/';
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
            '@logout' => 'a[name=logout]',
            '@newtask' => 'a[name=newtask]',
            '@start' => '#start',
            '@duration' => '#duration',
            '@taskType' => '#taskType',
            '@description' => '#description',
            '@delete' => 'a[name=delete]',
        ];
    }
}
