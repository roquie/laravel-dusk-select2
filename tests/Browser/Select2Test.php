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

    /**
     * @throws Throwable
     */
    public function testShouldSupportSelect2v3()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/index_v3.html')
                ->select2('#js-example-basic-single', 'Calif')
                ->assertSeeIn('#s2id_js-example-basic-single', 'California')
                ->select2('#js-example-basic-hide-search', 'Nev')
                ->assertSeeIn('#s2id_js-example-basic-hide-search', 'Nevada')
                ->click('h3:first-child') // close the previous select
                ->select2('#js-example-basic-multiple', 'Wy')
                ->waitFor('.select2-search-choice')
                ->click('h3:first-child') // close the previous select
                ->select2('#js-data-example-ajax', 'laravel')
                ->waitForText('laravel')
            ;
        });
    }
}