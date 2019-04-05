<?php

/*
 * Panther Demo
 *
 * Jeff Channell 2019
 */

namespace JeffChannell\PantherDemo\Tests\Suite\Panther;

use JeffChannell\PantherDemo\Tests\Lib\TestCase;

/**
 * Panther Example 1.
 */
class Example1Test extends TestCase
{
    /**
     * Fetch the index and test that the welcome message appears.
     */
    public function test_index()
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/index.php');

        $this->waitForDemo($client);

        $this->assertStringContainsString('Hello Panther!', $crawler->html());
    }
}
