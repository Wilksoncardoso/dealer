<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\post;
use App\User;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{


    public function Dashboard(){
        if (Auth::check() === true){

            switch (Auth::user()->nivel) {

                case 1:
                   
                    return redirect()->route('root');

                break;


                case 2:
                    //entrada de usuario


                    $data = DB::table('nivel_acessos')->
                        select('nivel_acessos.id','nivel_acesso', 'users.id', 'users.image','users.created_at')
                        ->join('users', 'nivel_acessos.id', '=', 'users.nivel')
                        ->where('nivel_acessos.id',Auth::user () ->nivel)
                        ->where('users.id',Auth::user () ->id)
                        ->get()->toArray();

                        
                        $data1= DB::table('post')->
                        select('id_user', 'id_estado','titulo','assunto', 'created_at','id' )
                        ->where('id_user',Auth::user () ->id)
                        ->where('id_estado',1)->orderBy('id', 'desc')->paginate(5, ['*'], 'data1');

                        
                        $data2= DB::table('post')->
                        select('id_user', 'id_estado','titulo','assunto', 'created_at','id' )
                        ->where('id_user',Auth::user () ->id)
                        ->where('id_estado',2)->orderBy('id', 'desc')->paginate(5, ['*'], 'data2');




                    

                        $estado=DB::table('estados')->
                        select('id','tipo')->get()->toArray();

                         return view('admin.Dashboard', compact('data','estado','data1','data2'));
                    break;
               
            }

        // dd(Auth::user());
        
        }
       
        return redirect()->route('home');
    }

    public function Login_User(){
        return view('admin.formlogin');
    }

    public function login(Request $request){
       var_dump( $request->all());

        $credencial =[
            'email' =>$request->email,
            'password' =>$request->password

        ];

     if(   Auth::attempt($credencial)){

        return redirect()->route('admin');

    }

     return redirect()->
     back()->withInput()->withErrors(['Os dados informados não conferem !']);
        
   }

   public function logout(){
       Auth::logout();
       return redirect()->route('home');
   }

   public function registrar(){
    return redirect()->route('admin.registrar');
   }

public function home(){
    


    return redirect()->route('admin');
 
}

public function upload(Request $request){
    $user = \App\User::find( Auth::user () ->id); //busca o valor edit

    if ($request->hasFile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/user/',$filename);
        $user->image =$filename;
    }else{
        return $request;
        $user->image='';
    }
    $user->save();


    return redirect()->route('admin')->with('user',$user);


}


public function post(Request $request){
    

    $post = new post();
    $post->id_user = $request->input('user');
    $post->id_estado = $request->input('estado');
    $post->titulo = $request->input('titulo');
    $post->texto = $request->input('texto');
    $post->assunto = $request->input('Assunto');

        if ($request->hasFile('image_post')){
        $file = $request->file('image_post');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/post/',$filename);
        $post->image_post =$filename;
    }else{
        return $request;
        $post->image='';
    }
    $post->save();

    return redirect()->route('admin')->with('post',$post);
}

public function show_publicacao(){
    
}



}