<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\post;
use App\User;
use Illuminate\Support\Facades\DB;

class RootController extends Controller
{
   
    public function root(){
        if (Auth::check() === true ){
            switch (Auth::user()->nivel) {
                case 1:

                    $data_user = User::all();

                    $data = DB::table('nivel_acessos')->
                        select('nivel_acessos.id','nivel_acesso', 'users.id', 'users.image','users.created_at')
                        ->join('users', 'nivel_acessos.id', '=', 'users.nivel')
                        ->where('nivel_acessos.id',Auth::user () ->nivel)
                        ->where('users.id',Auth::user () ->id)
                        ->get()->toArray();

                    $data1 = DB::table('users')
                    ->select('id', 'name', 'nivel', 'image')
                    ->where('nivel',Auth::user () ->nivel)->orderBy('id', 'desc')
                    ->paginate(7);


                    return view ('root.index', compact('data_user','data', 'data1'));
                    

                break;

                case 2: 

                    return redirect()->route('admin');

                break;
            
            }
    }
    }

    public function edit_root(){

        return view ('root.root_edit');

    }

    public function update_image_root(Request $request){

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
    return redirect()->route('root.editar',['store' => Auth::user () ->id])->with('user',$user);


    }

    public function update_root(Request $request){

        $user = \App\User::find( Auth::user () ->id);

        $user->name = $request->input('name');
        $user->titulo = $request->input('titulo');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->password);
        
        $user->save();
        return redirect()->route('root.editar',['store' => Auth::user () ->id])->with('user',$user);
    }

    public function destroy_root (Request $request, $store){
        $store = \App\user::find($store);
        $store->delete();
        return redirect()->route('root');

    }


    public function update_root_permissao_deixar(Request $request, $store){

        $store = \App\User::find($store);
        $store->nivel = $request->input('nivel');
        $store->save();

        return redirect()->route('root')->with('store',$store);

    }

    public function list_user(){

        $data = DB::table('users')->orderByDesc('id')->paginate(10);

        return view('root.listar_user', compact('data'));
    }

    public function list_post(){
       
        $data = DB::table('users')
        ->leftJoin('post', 'users.id', '=', 'post.id_user')
        ->where('post.id_estado',1)->orderByDesc('post.id')
        ->paginate(10);
       
       
        return view('root.listar_post',compact('data'));
    }

    public function destroy_root_post($store){
        
        $store = \App\post::find($store);
        $store->delete();
        return redirect()->route('root.list.post');
    }

    public function destroy_root_user($store){
        
        $store = \App\post::find($store);
        $store->delete();
        return redirect()->route('root.list.post');
    }

    public function root_edit_publica($store){
        if (Auth::check() === true ){
            switch (Auth::user()->nivel) {
                case 1:
                    $store=DB::table('post')->
                    where('id', $store)->get();

                    $estado=DB::table('estados')->
                        select('id','tipo')->get()->toArray();

                    return view ('root.editar_root', compact('store','estado'));

                break;

        }
    }

    }

    public function root_post_update(Request $request, $store){


        $data = $request->all();
        $store = \App\post::find($store);
        $store->update($data);
        return redirect()->route('root.list.post');

    }

    
}
