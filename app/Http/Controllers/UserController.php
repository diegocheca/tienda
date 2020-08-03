<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("usuarios.usuarios_index", ["usuarios" => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuarios.usuarios_create");
    }


    public function export(){
        /* Desechamos cualquier contenido generado previamente */
        ob_end_clean();
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User($request->input());
        $usuario->password = Hash::make($usuario->password);

        //avatar
        if ($request->hasFile('foto')){
        $usuario['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        $usuario->saveOrFail();
        return redirect()->route("usuarios.index")->with("mensaje", "Usuario guardado");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->password = "";
        return view("usuarios.usuarios_edit", ["usuario" => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->input());
       // if()
        if( ($user->password == "") || ($user->password == null) )
        {
            $user_agurdar = $request->except(['password', '_token', '_method', "fotonueva"]);
            if ($request->hasFile('fotonueva'))
            {
               // var_dump('public/'.$user->foto);die();
                Storage::delete('public/'.$user->foto);
                $user_agurdar['foto'] = $request->file('fotonueva')->store('uploads', 'public');
            }
            //$user->saveOrFail();
            User::where('id' , '=', $user->id)->update( $user_agurdar );
            return redirect()->route("usuarios.index")->with("mensaje", "Usuario actualizado");
        }

        else 
        {
            $user->password = Hash::make($user->password);
            if ($request->hasFile('fotonueva'))
                $user['foto'] = $request->file('fotonueva')->store('uploads', 'public');
            $user->saveOrFail();
            //User::update( $user );
            return redirect()->route("usuarios.index")->with("mensaje", "Usuario actualizado");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("usuarios.index")->with("mensaje", "Usuario eliminado");
    }
}
