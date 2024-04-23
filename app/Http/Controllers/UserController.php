<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController {

  public function index()
  {
      $users = DB::select('select * from users where id = :id', ['id' => 1]);
      $user = $users[0];

      foreach ($users as $user) {
        echo $user->name;
        var_dump($user);
      }

      return view('user.index', ['user' => $user]);
  }
}