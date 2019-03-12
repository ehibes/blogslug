<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/post');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertContains('accent', $crawler->filter('h1')->text());

        $link = $crawler
		    ->filter('a') // find all links with the text "Greet"
		    ->eq(1) // select the second link in the list
		    ->link()
		;

		$crawler = $client->click($link);
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertContains('é', $crawler->filter('h1')->text());
    }

    public function testApi()
    {
    	// submits a raw JSON string in the request body
        $client = static::createClient();
		$client->request(
		    'GET',
		    '/api/posts/1.json',
		    [],
		    [],
		    ['CONTENT_TYPE' => 'application/json']
		);

		$this->assertEquals(
		    200,
		    $client->getResponse()->getStatusCode()
		);
    }
}
