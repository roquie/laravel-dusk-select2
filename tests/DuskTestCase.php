<?php declare(strict_types=1);

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\Browser;
use Konsulting\DuskStandalone\TestCase;

abstract class DuskTestCase extends TestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        Browser::$storeScreenshotsAt = __DIR__ . '/Browser/screenshots';
        Browser::$storeConsoleLogAt = __DIR__ . '/Browser/console';
    }

    // Set the base url for the browser requests
    protected function baseUrl()
    {
        return 'http://localhost:8888';
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $arguments = [
            '--disable-gpu',
            '--window-size=1920,1080',
            '--no-sandbox'
        ];

        if (getenv('CHROME_HEADLESS') === 'true') {
            $arguments[] = '--headless';
        }

        $options = (new ChromeOptions())->addArguments($arguments);

        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
            ChromeOptions::CAPABILITY, $options
        ));
    }
}
