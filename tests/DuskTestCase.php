<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 9/4/17
 */

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\Browser;

abstract class DuskTestCase extends \Laravel\Dusk\TestCase
{
    use CreatesApplication;

    public function setUp()
    {
        parent::setUp();

        Browser::$baseUrl = 'http://localhost:8081';
        Browser::$storeScreenshotsAt = __DIR__ . '/Browser/screenshots';
        Browser::$storeConsoleLogAt = __DIR__ . '/Browser/console';
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::safari()
        );
    }
}