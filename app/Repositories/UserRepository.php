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

  public function edit($id)
  {
    $registro = $this->user->find($id);
		return $registro;
  }

  public function update($id, $dados)
  {    
    $registro = $this->user->find($id)->update($dados);
  }

}
