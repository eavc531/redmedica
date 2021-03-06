<?php

namespace App\Http\Controllers;
use App\administrator;
use App\permission;
use App\city;
use App\user;
use App\Role;
use App\role_user;
use Illuminate\Http\Request;

class administratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
      $administrators = administrator::orderBy('id','desc')->paginate(10);
        return view('administrators.index')->with('administrators', $administrators);
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */





    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'lastName'=>'required',
           'email'=>'required|unique:medicos|unique:users',
           'password'=>'required',
        ]);

        $administrator = new administrator;
        $administrator->fill($request->all());
        $administrator->save();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->administrator_id = $administrator->id;
        $user->save();
        $role = Role::where('name','Admin')->first();

        $user->attachRole($role);
         return redirect()->route('administrators.index')->with('success', 'Se ha creado un nuevo Administrador de Forma Satisfactoria');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $medico = medico::find($id);
        return view('medico.edit')->with('medico', $medico);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
