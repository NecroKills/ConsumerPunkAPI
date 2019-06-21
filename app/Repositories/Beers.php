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

  /**
   * Display the specified resource.
   * Faço uma pesquisa NA API PUNK, buscando todas as cervejas da pagina1 com tamanho maximo de 80
   * @return json_decode retorna a pesquisa para o PunkController;
   */
  public function all()
  {
    $response = $this->client->request('GET', 'beers?page=1&per_page=80', ['verify' => false]);
    return json_decode($response->getBody()->getContents());
  }

  /**
   * Display the specified resource.
   * Faço uma pesquisa NA API PUNK, buscando a cerveja pelo ID
   * @param  int  $id
   * @return json_decode retorna a pesquisa para o PunkController;
   */
  public function find($id)
  {
    $response = $this->client->request('GET', "beers/{$id}", ['verify' => false]);
    return json_decode($response->getBody()->getContents());
  }

  /**
   * Display the specified resource.
   * Faço uma pesquisa NA API PUNK, buscando todas as cervejas que combinam com o nome fornecido
   * @param  string  $name
   * @return json_decode retorna a pesquisa para o PunkController;
   */
  public function findName($name)
  {
    $response = $this->client->request('GET', "beers?beer_name={$name}", ['verify' => false]);
    return json_decode($response->getBody()->getContents());
  }

  /**
   * Display the specified resource.
   * Faço uma pesquisa NA API PUNK, buscando todas as cervejas que combinam com o filtro fornecido
   * @param  array  $dados
   * @return json_decode retorna a pesquisa para o PunkController;
   */
  public function filter($dados)
  {
    $tipo1=$dados['tipo1'];
    $tipo2=$dados['tipo2'];
    $tipo=$tipo1.$tipo2;
    $valor=$dados['valor'];
    $response = $this->client->request('GET', "beers?{$tipo}={$valor}", ['verify' => false]);
    return json_decode($response->getBody()->getContents());
  }

}
