<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index(){
        return view('login');
    }

    public function cadastro(){
        return view('cadastro');
    }

    public function principal(){
        return view('principal');
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function auth(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required' => 'O email é obrigatório!',
            'password.required' => 'A senha é obrigatória!',
        ]);
       
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('principal');
        } else {
            return redirect()->back()->with('msg',"Acesso negado para estas credenciais");
        }
    }

    public function register(Request $request){
        
        $credentials = $request->validate([
            'nome' => ['required'],
            'email' => ['required'],
            'senha' => ['required'],
        ],[
            'nome.required' => 'O nome é obrigatório!',
            'email.required' => 'O email é obrigatório!',
            'senha.required' => 'A senha é obrigatória!'
        ]);

        $query = User::where('email', $request->email)->get();

        if(count($query) > 0){
            return redirect()->back()->with('msg_erro',"Esse email já está cadastrado.");
        } else {
            $insert = User::create([
                'name' => $request->nome,
                'email' => $request->email,
                'password' => Hash::make($request->senha)
            ]);

            if($insert){
                return redirect()->route('login')->with('msg_success',"Cadastro concluído!");
            }
        }
    }

}
