<?php

declare(strict_types=1);

namespace Laravel\Dusk\Select2\Tests\Browser;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Select2\Tests\DuskTestCase;

class Select2Test extends DuskTestCase
{
    public function testShouldBeSelect2SelectableAutomatically()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->select2('.js-example-basic-single', 'Calif')
                ->assertSeeIn('.js-example-basic-single + .select2', 'California')
                ->select2('.js-example-basic-hide-search', 'Nev')
                ->assertSeeIn('.js-example-basic-hide-search + .select2', 'Nevada')
                ->click('h3:first-child') // close the previous select
                ->select2('.js-example-basic-multiple', 'Wy')
                ->waitFor('.select2-selection__choice')
                ->click('h3:first-child') // close the previous select
                ->select2('.js-data-example-ajax', 'laravel')
                ->waitForText('laravel')
            ;
        });
    }

    public function testShouldSupportSelect2v3()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/index_v3.html')
                ->select2('.js-example-basic-single', 'Calif')
                ->assertSeeIn('.js-example-basic-single', 'California')
                ->select2('.js-example-basic-hide-search', 'Nev')
                ->assertSeeIn('.js-example-basic-hide-search', 'Nevada')
                ->click('h3:first-child') // close the previous select
                ->select2('.js-example-basic-multiple', 'Wy')
                ->waitFor('.select2-selection__choice')
                ->click('h3:first-child') // close the previous select
                ->select2('.js-data-example-ajax', 'laravel')
                ->waitForText('laravel')
            ;
        });
    }
}
