<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class Create extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/create';
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
            '@start' => 'input[name=start]',
            '@duration' => 'input[name=duration]',
            '@taskType' => 'select[name=taskType]',
            '@description' => 'input[name=description]',
            '@cancel' => 'a[name=cancel]',
        ];
    }
}
