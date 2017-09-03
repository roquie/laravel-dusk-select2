# laravel-dusk-select2
Select2.js support for the Laravel Dusk testing

<p align="center">
  <img height="350" src="./demo.gif">
</p>

## Install

`composer require --dev roquie/laravel-dusk-select2`

Now, u may use it!

## Upgrade from 0.1.* to 1.0.*

1. Update your `roquie/laravel-dusk-select2` dependency to `^1.0` in your `composer.json` file.
2. Remove ` + .select2` from first parameter, also see [last parameter](./src/macro.php#L17).

## Usage

For default select2:

```php
$browse->select2('@selector');
```

`@selector` class name of your `<select>` html tag. <br>
If value not passed, it be selected automatically.

Another way, if need concrete value:
```php
$browse->select2('@selector', 'you_text_value');
```

For multiple mode usage like this:
```php
$browse->select2('@selector', ['foo', 'bar'], 5);
// the last parameter - count of seconds for ajax loading before choice item.
```

## Examples

[Here.](./tests/Browser/Select2Test.php)

## Todo

 * [x] Add Laravel Dusk tests for Laravel Dusk extend feature ;)
 * [x] Add gif demonstration how it works.
 * [x] May be use `+ select2` out of the box?.
 * [ ] Travis CI.

## Tests

[@taylorotwell](https://github.com/taylorotwell) don't kill the kittens, Laravel Dusk also should be used outside of framework.  

* `cd tests`
* `php -S localhost:8081 tests/index.html`
* `vendor/bin/phpunit`

If u using MacOS, before running `phpunit`, run `vendor/laravel/dusk/bin/chromedriver-mac`.

## License 

[MIT](./LICENSE)
