<?php

/*
 * Panther Demo
 *
 * Jeff Channell 2019
 */

namespace JeffChannell\PantherDemo\Tests\Suite\Panther;

use JeffChannell\PantherDemo\Tests\Lib\TestCase;

/**
 * Panther Example 2.
 */
class Example2Test extends TestCase
{
    /**
     * Test cases.
     *
     * @return array
     */
    public function cases_form(): array
    {
        return [
            ['Howard Moon', 1, 'Fnord!'],
            ['Vince Noir', 2, 'Excellent choice!'],
            ['Bob Fossil', 3, 'Interesting selection...'],
        ];
    }

    /**
     * Test runner.
     *
     * @param string $name
     * @param int    $number
     * @param string $message
     *
     * @dataProvider cases_form
     */
    public function test_form(string $name, int $number, string $message)
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/form.php');

        $this->waitForDemo($client);

        $form = $crawler->selectButton('Submit')->form([
            'name' => $name,
            'number' => "$number",
        ]);
        $crawler = $client->submit($form);

        $this->waitForDemo($client);

        $html = $crawler->html();
        $this->assertStringContainsString($name, $html);
        $this->assertStringContainsString($message, $html);
    }
}
