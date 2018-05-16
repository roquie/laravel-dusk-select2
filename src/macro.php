<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 07/03/2017
 */

use Laravel\Dusk\Browser;

/**
 * Register simple macros for the Laravel Dusk.
 * $field - selector, or @element
 * $value - option value, may be multiple, eg. ['foo', 'bar']
 * $wait  - count of seconds for ajax loading.
 */
Browser::macro('select2', function ($field, $value = null, $wait = 2, $suffix = ' + .select2') {
    /** @var Browser $this */
    $this->click($field . $suffix);

    // if $value equal null, find random element and click him.
    // @todo: may be a couple of times move scroll to down (ajax paging)
    if (null === $value) {
        $this->waitFor('.select2-results__options .select2-results__option--highlighted');
        $this->script(join('', [
            "var _dusk_s2_elements = document.querySelectorAll('.select2-results__options .select2-results__option');",
            "document.querySelector('.select2-results__options .select2-results__option--highlighted').classList.remove('select2-results__option--highlighted');",
            'var _dusk_s2_el = _dusk_s2_elements[Math.floor(Math.random()*(_dusk_s2_elements.length - 1))];',
            "_dusk_s2_el.classList.add('select2-results__option--highlighted');"
        ]));
        $this->click('.select2-results__option--highlighted');

        return $this;
    }

    // check if search field exists and fill it.
    if ($element = $this->element('.select2-container.select2-container--open .select2-search__field')) {
        try {
            foreach ((array) $value as $item) {
                $element->sendKeys($item);
                sleep($wait);
                $this->click('.select2-results__option--highlighted');
            }

            return $this;
        } catch (\Exception $exception) {}
    }

    // another way - w/o search field.
    $this->script("jQuery.find(\".select2-results__options .select2-results__option:contains('{$value}')\")[0].click()");

    return $this;
});
