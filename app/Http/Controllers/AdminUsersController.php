<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Position;

/**
 * Administra los users que se almacenaran en la base de datos.
 */

class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin')->only('create', 'store', 'destroy');
    }

    /**
     * Muestra el menu deoperaciones relacionadas con users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('position', function($query){
            $query->whereIn('id', [2,3]);
        })->get();

        return view('user.indexUsers', compact('users'));
    }

    /**
     * Muestra el formulario para crear un nuevo user.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        $positions = Position::pluck('name', 'id')->toArray();

        return view('user.formUser', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'integer',
            'address' => 'string|max:255',
            'cellphone' => 'string|max:10',
            'position_id' => 'required'
        ]);

        $all_request = $request->all();

        $all_request['password'] = bcrypt($all_request['password']);
        $user = User::create($all_request);

        return redirect()->route('users.show', $user->id)
            ->with(['message' => 'Usuario creado con éxito.', 'alert-class' => 'alert-success']);
    }

    /**
     * Muestra la información de un user especificado.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.showUser', compact('user'));
    }

    /**
     * Muestra el formulario para editar un user. 
     *
     * @param  integer  $id 
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $positions = Position::pluck('name', 'id')->toArray();

        return view('user.formUser', compact('user', 'positions'));
    }

    /**
     * Actualiza la informacón de un user almacenado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'confirmed',
            'position_id' => 'sometimes|required'
        ]);

        if ($request->has('password')) {
            $all_request = $request->all();
            $all_request['password'] = bcrypt($all_request['password']);
        } else {
            $all_request = $request->except(['password', 'password_confirmation']);
        }

        $user->update($all_request);

        return redirect()->route('users.show', $user->id)
            ->with(['message' => 'Usuario actualizado con éxito.', 'alert-class' => 'alert-success']);
    }

    /**
     * Elimina un user de los que están almacenados en la  base de datos.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
 
        return redirect()->route('users.index')->with('alert', 'Has borrado el user exitosamente');
    }
}
