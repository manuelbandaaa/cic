<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Planning;

class CandidatesController extends Controller
{
    private $degrees = ['Primaria' => 'Primaria', 'Secundaria' => 'Secundaria', 'Preparatoria' => 'Preparatoria', 'Universidad' => 'Universidad'];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('supervisor');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate.formCandidate')->with(['degrees' => $this->degrees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'name' => 'required | max:255',
            'email' => 'sometimes| unique:users',
            'age' => 'required | integer',
            'cellphone' => 'sometimes | max:15',
            'address' => 'required | max:255',
            'degree' => 'required',
            'level' => 'required | integer',
            'average' => array('required', 'regex: /^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'),
            'career' => 'sometimes'
        ],
        [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser un número.',
            'unique' => 'El campo :attribute ya existe, escribe otro.',
            'regex' => 'El campo :attribute es invalido.'
        ]);*/

        if(($request->degree == 'Preparatoria' || $request->degree == 'Universidad') && $request->email==null){
            return redirect()->route('candidates.create')->with(['degrees' => $this->degrees, 'message' => 'Error: Alumnos de preparatoria y universidad necesitan un correo obligatoriamente', 'alert-class' => 'alert-danger']);
        } else {
            $user = new User;
            $user->name = $request->name;
            if($request->email != null){
                $user->email = $request->email;
            }else{
                $user->email = $request->name . strval(rand(1, 10000)) . '@invalido.com';
            }

            if($request->degree == 'Preparatoria' || $request->degree == 'Universidad'){
                $user->password = bcrypt('cic');
            }else{
                $user->password = bcrypt('sincontraseña');
            }
            $user->age = $request->age;
            $user->cellphone = $request->cellphone;
            $user->address = $request->address;
            $user->degree = $request->degree;
            $user->level = $request->level;
            $user->average = $request->average;
            $user->career = $request->career;
            $user->position_id = 4;
            $user->save();

          return redirect()->route('candidates.create')->with(['degrees' => $this->degrees, 'message' => 'Aspirante creado con éxito.', 'alert-class' => 'alert-success']);
        }
        
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

    public function list($type)
    {
        $type = $this->getDegree($type);
        $candidates = User::where('degree', $type)->where('position_id', 4)
                            ->with(['Planning'])
                            ->get();

        return view('candidate.candidatesList', compact('type', 'candidates'));
    }

    public function getDegree($type)
    {
        switch ($type) {
            case 'elementary-school':
                return "Primaria";
            
            case 'secondary-school':
                return "Secundaria";

            case 'high-school':
                return "Preparatoria";

            case 'university':
                return "Universidad";
        }
    }
}
