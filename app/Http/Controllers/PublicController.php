<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\post;
use App\User;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function home(){

        $data = DB::table('users')
        ->leftJoin('post', 'users.id', '=', 'post.id_user')
        ->where('post.id_estado',1)->orderByDesc('post.id')
        ->paginate(5);

        return view('public.home', compact('data'));
    }

    public function registrar(){
        return view('public.registrar');

    }

    public function show_public($store){

        $store=DB::table('post')->

        where('post.id', $store)->get();

        return view('public.view', compact('store'));
    }


}
