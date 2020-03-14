<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\post;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
   // aqui começa publicação  
    public function edit_publica($store){
        if (Auth::check() === true){

        $store = \App\post::find($store);

        $estado=DB::table('estados')->
        select('id','tipo')->get()->toArray();



        return view('admin.editar_publica', compact('store','estado'));
        }

    }

    public function update_publica( Request $request, $store){

            $data = $request->all();
            $store = \App\post::find($store);
            $store->update($data);
            return redirect()->route('admin');
        
    }

    public function destroy_publica($store){

        $store = \App\post::find($store);
        $store->delete();
        return redirect()->route('admin');
    }

// aqui começa publicação apenas salva

public function edit_salva($store){

    if (Auth::check() === true){

        $store = \App\post::find($store);

        $estado=DB::table('estados')->
        select('id','tipo')->get()->toArray();



        return view('admin.editar_salvar', compact('store','estado'));
        }
}

public function update_salva( Request $request, $store){

    $data = $request->all();
    $store = \App\post::find($store);
    $store->update($data);
    return redirect()->route('admin');
}

public function destroy_salva($store){

    $store = \App\post::find($store);
    $store->delete();
    return redirect()->route('admin');
}

public function global(){

    if (Auth::check() === true){
        // dd(Auth::user());
        $data = DB::table('nivel_acessos')->
         select('nivel_acessos.id','nivel_acesso', 'users.id', 'users.image','users.created_at')
        ->join('users', 'nivel_acessos.id', '=', 'users.nivel')
        ->where('nivel_acessos.id',Auth::user () ->nivel)
        ->where('users.id',Auth::user () ->id)
        ->get()->toArray();

        $data1 = DB::table('users')
        ->leftJoin('post', 'users.id', '=', 'post.id_user')
        ->where('post.id_estado',1)->orderByDesc('post.id')
        ->paginate(10);


    return view('admin.publica_global', compact('data', 'data1'));
    }
    return redirect()->route('home');
}

public function minhas_publicacao(){


    
    

    $data=DB::table('users')
    ->select('users.id','users.name', 'users.image', 'users.email', 
             'post.titulo', 'post.assunto', 'post.created_at', 'post.image_post','post.id')
    ->leftJoin('post', 'users.id', '=', 'post.id_user')
    ->where('users.id',Auth::user () ->id)-> orderBy('post.id', 'desc')
    ->paginate(4);

    return view('admin.publica_user', compact('data'));


}

public function destroy_publica_user($store){
    $store = \App\post::find($store);
    $store->delete();
    return redirect()->route('user.publicacao');
}

public function editar_user(){
    if (Auth::check() === true){
        

        $user = \App\post::find(Auth::user () ->id);

        $data = DB::table('nivel_acessos')->
        select('nivel_acessos.id','nivel_acesso', 'users.id', 'users.image','users.created_at')
       ->join('users', 'nivel_acessos.id', '=', 'users.nivel')
       ->where('nivel_acessos.id',Auth::user () ->nivel)
       ->where('users.id',Auth::user () ->id)
       ->get()->toArray();

        return view('user.user', compact('user', 'data'));
    }     
}

public function update_user(Request $request){

$user = \App\User::find( Auth::user () ->id);

$user->name = $request->input('name');
$user->titulo = $request->input('titulo');
$user->email = $request->input('email');
$user->password = bcrypt($request->password);

$user->save();
return redirect()->route('user.editar',['store' => Auth::user () ->id])->with('user',$user);
      
}

public function upload_image(Request $request){

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


    return redirect()->route('user.editar',['store' => Auth::user () ->id])->with('user',$user);


}


public function destroy_user($user){
    user::where('id', $user)->delete();
    return redirect()->route('home');

}


}
