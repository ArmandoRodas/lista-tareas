<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\Tarea;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class TareaController extends Controller
{
    
    public function index(){
        $tareas = Tarea::all();
        return view('Tareas.index', compact('tareas'));
    }

    public function crear(){
        return view('Tareas.create');
    }

    public function guardar(Request $request){
        $request->validate([
            'titulo'=>'required|max:255',
            'descripcion'=>'nullable',
        ]);
        Tarea::create($request->only('titulo','descripcion'));
        return redirect('/tareas')->with('success','Tarea creada correctamente');
    }

    public function editar($id){
        $tarea = Tarea::findOrFail($id);
        return view('Tareas.edit',compact('tarea'));
    }

    public function actualizar (Request $request,$id){
        $request->validate([
            'titulo'=>'required|max:255',
            'descripcion'=>'nullable',
        ]);
        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->only('titulo','descrption'));

        return redirect('/tareas')->with('success','Tarea actualizada correctamente');
    }

    public function eliminar($id){
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect('/tareas')->with('success','Tarea eliminada correctamente');
    }

    public function completar($id){
        $tarea = Tarea::findOrFail($id);
        $tarea->completada =!$tarea->completada;
        $tarea->save();

        return back()->with('success','Estado completado correctamente');
    }

    public function favorita($id){
        $tarea = Tarea::findOrFail($id);
        $tarea->favorita = !$tarea->favorita;
        $tarea->save();

        return back()->with('success','Estado de deshabilitada actualizada');
    }
    
    public function deshabilitar($id){
        $tarea = Tarea::findOrFail($id);
        $tarea->deshabilitada = !$tarea->deshabilitada;
        $tarea->save();

        return back()->with('success','Estado de deshabilitada actualizada');
    }


}
