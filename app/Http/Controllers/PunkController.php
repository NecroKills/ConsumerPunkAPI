<?php

namespace App\Http\Controllers;

use App\Repositories\Beers;
use Illuminate\Http\Request;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $beers = $this->beers->all();
      return view('beers.home', compact('beers'));
    }

    /**
     * Display the specified resource.
     *
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
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function beerName(Request $request)
    {
      $name = $request['name'];
      $beer = $this->beers->findName($name);
      if (!empty($beer)) {
        return view('beers.beer', compact('beer'));
      }else {
        return redirect()->back()->with('alert','Nenhuma cerveja encontrada!');
      }
    }

}
