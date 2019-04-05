<?php

/*
 * Panther Demo
 *
 * Jeff Channell 2019
 */

namespace JeffChannell\PantherDemo\Tests\Lib;

use Symfony\Component\Panther;

class TestCase extends Panther\PantherTestCase
{
    /**
     * Either sleep for a period of time, or take a screenshot.
     *
     * @param Panther\Client $client
     */
    protected function waitForDemo(Panther\Client &$client)
    {
        if ($sleep = (int) getenv('PANTHER_NO_HEADLESS')) {
            sleep($sleep);
        } else {
            $client->takeScreenshot(\sys_get_temp_dir().'/screenshot_'.(trim(str_replace('\\', '_', (get_called_class())), '_')).'.png');
        }
    }
}
