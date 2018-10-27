<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Maatwebsite\Excel\Facades\Excel;

class StudentsController extends Controller
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
        $this->validate($request, [
            'name' => 'required | max:255',
            'email' => $request->degree == 'Preparatoria' || $request->degree == 'Universidad'?'email | unique:users':'',
            'age' => 'required | integer',
            'cellphone' => 'sometimes | max:15',
            'address' => 'required | max:255',
            'degree' => 'required',
            'level' => 'required | integer',
            'average' => 'required',
        ],
        [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser entero.',
            'unique' => 'El campo :attribute ya existe, escribe otro.',
            'regex' => 'El campo :attribute es invalido.'
        ]);

        $user = new User;
        $user->name = $request->name;
        if(isset($request->email)){
            $user->email = $request->email;
        }else{
            $user->email = $request->name;
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
        $user->position_id = 4;
        $user->save();

      return redirect()->route('candidates.create')->with(['degrees' => $this->degrees, 'message' => 'Aspirante creado con éxito.', 'alert-class' => 'alert-success']);
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
        $students = User::where('degree', $type)->where('position_id', 3)->get();
        $students->load(['course']);

        return view('student.studentsList', compact('type', 'students'));
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

            default:
                return $type;
        }
    }

    public function selectWinners(Request $request){
        $students = User::where('degree', $request->type)
                        ->where('position_id', 4)
                        ->orderBy('pay', 'desc')
                        ->get();
        count($students) < $request->numWinners ? $numWinners = count($students) : $numWinners = $request->numWinners;
        for($i=0; $i<$numWinners; $i++){
            $students[$i]->position_id = 3;
            $students[$i]->save();
        }

        return redirect()->action('StudentsController@list', $request->type);
    }

    public function generate_excel()
    {
        $students = User::where('position_id', 3)->get();

        $documentName = "IJAS ";

        $xls_doc = Excel::load(public_path('IJAS.xlsx'));
        $contador = 12;
        foreach($students as $student){
            $xls_doc->getActiveSheet()->setCellValue('A'.strval($contador), "EDUCATIVO");
            $xls_doc->getActiveSheet()->setCellValue('B'.strval($contador), strval($contador-11));
            $xls_doc->getActiveSheet()->setCellValue('C'.strval($contador), $student->name);
            $xls_doc->getActiveSheet()->setCellValue('D'.strval($contador), $student->age);
            $xls_doc->getActiveSheet()->setCellValue('E'.strval($contador), $student->address);
            $xls_doc->getActiveSheet()->setCellValue('F'.strval($contador), $student->cellphone);
            $contador++;
        }

        $xls_doc->getActiveSheet()->setCellValue('A'.strval($contador+2), "RESPONSABLE LEGAL");
        $xls_doc->getActiveSheet()->setCellValue('D'.strval($contador+2), "DIRECTOR");
        $xls_doc->getActiveSheet()->setCellValue('A'.strval($contador+3), "MARTHA BEATRIZ MEDINA CHIPRES");
        $xls_doc->getActiveSheet()->setCellValue('D'.strval($contador+3), "M. CARMEN RODRIGUEZ GIL");

        $xls_doc->setFilename($documentName)->export('xlsx');
    }
}
