# laravel-dusk-select2
Select2.js support for the Laravel Dusk testing

## Usage

For default select2:

```php
$browse->select2('@selector');
```

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

## Notice

Css-selector for the `select` html tag should be ends with `+ select2` name.

Example:

We have a simple `select`:
```html
<select class="form-control select2-users" name="user_id">
</select>
```

Our css-selector name: `.select2-users + .select2`

## Todo

 * [ ] Add Laravel Dusk tests for Laravel Dusk extend feature ;)
 * [ ] Add gif demonstration how it works.
 * [ ] May be use `+ select2` out of the box?.

## License 

MIT