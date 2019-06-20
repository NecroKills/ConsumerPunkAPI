<?php

namespace App\Repositories;

use GuzzleHttp\Client;

class Beers
{
  /**
   * @var Client
   */
  protected $client;

  /**
   * Beers constructor.
   *Estou utilizando o padrao singleton no Repositories/AppServiceProvider
   */
  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function all()
  {
    $response = $this->client->request('GET', 'beers', ['verify' => false]);
    return json_decode($response->getBody()->getContents());
  }

  public function find($id)
  {
    $response = $this->client->request('GET', "beers/{$id}", ['verify' => false]);
    return json_decode($response->getBody()->getContents());
  }

  public function findName($name)
  {
    $response = $this->client->request('GET', "beers?beer_name={$name}", ['verify' => false]);
    return json_decode($response->getBody()->getContents());
  }

}
