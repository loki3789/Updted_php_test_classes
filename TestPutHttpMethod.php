<?php

require('../vendor/autoload.php');

class TestPutHttpMethod extends PHPUnit_Framework_TestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'https://reqres.in'
        ]);
    }
    
    public function testPutHttpMethod()
    {
        $Id = uniqid();
        $response = $this->client->put('/api/users/2', [  //update user 2
            'json' => [
                "id"=> $Id,
                "first_name"=> "Abc",
                "last_name"=>"xyz",
                "avatar"=> "https://s3.amazonaws.com/marcoramires/127.jpg"
            ]
         ]);

        $this->assertSame(200, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
        $this->assertSame($Id, $data['id']);
    }
}
