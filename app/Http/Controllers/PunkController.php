<?php

namespace App\Http\Controllers;

use App\Repositories\Beers;
use Illuminate\Http\Request;
use App\Http\Requests\BeersRequest;
class PunkController extends Controller
{

  /**
   * @var Beers
   */
  protected $beers;

  /**
   * PunkController constructor.
   *
   * @param Beers $beers
   */
  public function __construct(Beers $beers)
  {
    $this->middleware('auth');
    $this->beers = $beers;
  }

    /**
     * Display a listing of the resource.
     * Faço a busca na função all no Repositories/Beers
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $beers = $this->beers->all();
      return view('beers.home', compact('beers'));
    }

    /**
     * Display the specified resource.
     * Recebo os dados e envio para a função find no Repositories/Beers
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $beer = $this->beers->find($id);
      return view('beers.beer', compact('beer'));
    }

    /**
     * Display the specified resource.
     * Recebo os dados e envio para a função all no Repositories/Beers
     * @param  array  $request
     * @return \Illuminate\Http\Response
     */
    public function beerName(Request $request)
    {
      $dados = $request->all();
      $name = $dados['name'];
      $beer = $this->beers->findName($name);
      if (!empty($beer)) {
        return view('beers.beer', compact('beer'));
      }else {
        return redirect()->back()->with('alert','Nenhuma cerveja encontrada!');
      }
    }

    /**
     * Display the specified resource.
     * Recebo os dados e envio para a função filter no Repositories/Beers
     * @param  array  $request
     * @return \Illuminate\Http\Response
     */
    public function filtro(BeersRequest $request)
    {
      $dados = $request->all();
      $beer = $this->beers->filter($dados);
      if (!empty($beer)) {
        return view('beers.beer', compact('beer'));
      }else {
        return redirect()->back()->with('alert','Nenhuma cerveja encontrada!');
      }
    }

}
