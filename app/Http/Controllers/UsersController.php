<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as IlluminateUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;


class UsersController extends Controller
{

    public function AdLogin()
    {
        return view('dados.utilizadores.login');
    }
    
    public function verAdmin($email)
    {
        $confirm = User::where(['email'=>$email,'lvluser'=>'Admin'])->get();
        
        if(count($confirm)>0){
           return 'true';
        }else{
            return 'false';
        }
    }

    public function verLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && $this->verAdmin($credentials['email']) != 'false') {
            return redirect('/users');
        }else{
            return redirect('/537527');
        }
    }

    public function index()
    {
        $all = User::select()->get();
        return view('dados.utilizadores.tableutil')->with(compact("all"));
    }

    public function create()
    {
        return view('dados.utilizadores.createutil');
    }

    public function store(Request $request)
    {
        //feito pelo Auth
    }

    public function show($id)
    {
        //Nao é necessario
    }

    public function edit($id)
    {
        $all=User::select()->get();
        $only=User::where(['id'=>$id])->first();
        return view('dados.utilizadores.editutil')->with(compact("all","only"));
    }

    public function delete($id)
    {
        $all=User::select()->get();
        $only=User::where(['id'=>$id])->first();
        return view('dados.utilizadores.deleteutil')->with(compact("all","only"));
    }

    public function update(Request $request, $id)
    {       
        $data = $request->all();  
        $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string','min:4'],
            ]);

            User::where(['id'=>$id])->update([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            ]);

            return Redirect('/users');
    }

    public function destroy($id)
    {   
        $confirm = User::where(['id'=>$id])->first();
        if(($confirm->lvluser) == "Admin")
        {
          return redirect('/users');
        }
        
        User::where(['id'=>$id])->delete();
        return redirect('/users');
    }
}
