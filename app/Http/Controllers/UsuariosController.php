<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\User;
use Redirect;
use Auth;
use Input;

class UsuariosController extends Controller
{
    public function showLogin()
    {

    	/*
    	// Agregar el primer usuario manual
    	$user = new User;
    	$user->usuario = "winter";
    	$user->password = md5("1234qwer");
    	$user->save();
		//dd(User::find(1));
    	*/

    	return view('usuarios/show_login');
    }

    public function doLogin()
    {
    	$request = request();
    	$validator = Validator::make($request->all(), [
	        'usuario' => 'required|max:200',
	        'password' => 'required'
	    ]);

	    if ($validator->fails()) {
	        return redirect('/login')
	            ->withInput($request->except('password'))
	            ->withErrors($validator);
	    }

	    $userdata = array(
          'usuario' => $request->get('usuario') ,
          'password' => $request->get('password')
        );

	    $usuario = User::where('usuario', $request->get('usuario'))
	    	->where('password', md5($request->get('password')))->first();

        dd($usuario);

    }

    public function doLogout()
    {
    	
    }

}
