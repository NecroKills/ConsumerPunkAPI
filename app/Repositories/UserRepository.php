<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\User;

class UserRepository
{
  /**
   * @var User
   */
  protected $user;

  /**
   * UserRepository constructor.
   *
   */
  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * Faço uma pesquisa na tabela User, buscando o usuario pelo ID
   * @param  int  $id
   * @return $registro retorna o registro para o UserController;
   */
  public function edit($id)
  {
    $registro = $this->user->find($id);
		return $registro;
  }

  /**
   * É realizado um update no User do parametro $id
   * @param  int  $id
   * @param  array  $dados
   */
  public function update($id, $dados)
  {
    $registro = $this->user->find($id)->update($dados);
  }

}
