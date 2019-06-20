<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

  /**
   * @var UserRepository
   */
  protected $userRepository;

  /**
   * UserController constructor.
   *
   */
  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
    $this->middleware('auth');
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if($id == auth()->user()->id){
        $registro = $this->userRepository->edit($id);
        return view('user.perfil', compact('registro'));
      }else{
        return redirect()->back()->with('alert','Você não possui permissão!');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $dados = $request->all();
      $registro = $this->userRepository->update($id, $dados);
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
