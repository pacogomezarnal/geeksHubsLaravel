<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();

        return response()->json(['data'=>$users],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ];

        $this->validate($request,$rules);

        $data=$request->all();
        $data['password']=bcrypt($request->password);

        $user=User::create($data);

        return response()->json(['data'=>$user],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);

        return response()->json(['data'=>$user],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);

        $rules=[
            'email'=>'email|unique:users',
            'password'=>'min:6|confirmed'
        ];

        if($request->has('name')){
            $user->name=$request->name;
        }
        if($request->has('email')&& $user->email!=$request->email){
            $user->email=$request->email;
        }
        if($request->has('password')){
            $user->password=bcrypt($request->password);
        }

        $user->save();

        return response()->json(['data'=>$user],201);
    }

    /**
     * Remove the specified resourcxe from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
