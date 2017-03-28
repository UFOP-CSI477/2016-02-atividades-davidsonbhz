<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Grade;
use App\Disciplina;
class GradeController extends Controller
{

    /*
    public function __construct()
     {
         $this->middleware('auth',['except'=> 'index']);//so o index n precisa de login para ser acessado
     }
    */
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index')->with('grades', $grades);
    }

    public function create()
    {
        $grades = Grade::all();
        return view('grades.create')->with('grades', $grades);
    }


    public function store(Request $request)
    {
      Grade::create($request->all());
      return redirect('/grades');
    }



    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.edit')->with('grade', $grade);
    }


     public function update(Request $request, $id)
     {
       $grade = Grade::find($id);
       $grade->semestre=$request->semestre;
       $grade->diadasemana=$request->diadasemana;
       $grade->horario=$request->horario;
       $grade->disciplina=$request->disciplina;

       $grade->save();

       return redirect('/grades');
     }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return redirect('/grades');
    }
}
