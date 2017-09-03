<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 9/4/17
 */

use Laravel\Dusk\Browser;

class Select2Test extends DuskTestCase
{
    public function testShouldBeSelect2SelectableAutomatically()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->select2('.js-example-basic-single', 'Calif')
                ->assertSee('California')
                ->select2('.js-example-basic-hide-search')
                ->select2('.js-example-basic-multiple', 'Wy')
                ->waitFor('.select2-selection__choice')
                ->select2('.js-example-basic-multiple')
                ->select2('.js-data-example-ajax', 'laravel')
                ->assertSee('laravel')
            ;
        });
    }
}