<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Aluno;
use App\Turma;
use App\Candidato;
use App\Usuario;


class AdminController extends Controller
{

   
    function listarcandidatos() {
        //$usuario = Usuario::findOrFail($id);
        //$lista = DB::select(DB::raw("select g.grupo,g.nomegrupo,ug.usuario from grupo g inner join usuarioxgrupo ug on g.grupo=ug.grupo and ug.usuario=? union select gg.grupo,gg.nomegrupo,u.usuario from grupo gg inner join usuario u on u.grupo=gg.grupo and u.usuario=?"), [$id, $id]);
        //$listanao = DB::select(DB::raw("select * from grupo where grupo not in (select g.grupo from grupo g inner join usuarioxgrupo ug on g.grupo=ug.grupo and ug.usuario=? union select gg.grupo from grupo gg inner join usuario u on u.grupo=gg.grupo and u.usuario=?)"),[$id, $id]);

        $lista = DB::select(DB::raw("select * from candidato order by nome"));
        //dd($usuario);
        return view("candidatos.index")->with("lista", $lista);
    }
    
    function listarprofessores() {
        //professores sao usuarios que fazem parte do grupo de professores
        $lista = DB::select(DB::raw("select * from usuario where grupo=3 order by nome"));
        
        //dd($usuario);
        return view("professor.professores")->with("lista", $lista);
    }
    
    function listardisciplinaprofessor($id) {
        $usuario = Usuario::findOrFail($id);
        $lista = DB::select(DB::raw("select * from disciplina d inner join usuarioxdisciplina ud on d.disciplina=ud.disciplina and ud.usuario=?"),[$id]);
        $listanao = DB::select(DB::raw("select di.* from disciplina di where di.disciplina not in (select d.disciplina from disciplina d inner join usuarioxdisciplina ud on d.disciplina=ud.disciplina and ud.usuario=?)"),[$id]);
        
        return view("professor.disciplinas")->with("lista", $lista)->with("listanao", $listanao)->with("usuario", $usuario);
    }
    
    function desassociardisciplinaprofessor($id, $dis) {
        
    }
    
    
    function associardisciplinaprofessor($id, $dis) {
        
    }
}
