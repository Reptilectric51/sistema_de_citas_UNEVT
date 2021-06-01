<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CitasQuiropracticaCollection;
use App\Http\Resources\CitasQuiropracticaResource;
use App\Models\citas_quiropractica;
use Illuminate\Http\Request;

class citas_quiroprecticaController extends Controller
{
    public function index()
    {
        return new CitasQuiropracticaCollection(CitasQuiropractica::all());
    }

    public function create(){
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'apellido_paterno'=>'required',
            'apellido_materno'=>'required',
            'email'=>'required',
            'consultorio'=>'required',
            'estatus'=>'required',
            'fecha'=>'required',
            'hora'=>'required',
            'folio'=>'required',
            'creada'=>'required'
        ]);
        $cita = Citas::create($request->except('id'));
        return new CitaQuiropraticoResource($cita);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'apellido_paterno'=>'required',
            'apellido_materno'=>'required',
            'email'=>'required',
            'consultorio'=>'required',
            'estatus'=>'required',
            'fecha'=>'required',
            'hora'=>'required',
            'folio'=>'required',
            'creada'=>'required'
        ]);
        $cita = Citas::findOrfail('id');
        $cita->update($request->only([
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            'email',
            'consultorio',
            'estatus',
            'fecha',
            'hora',
            'folio',
            'creada',
        ]));
        return new CitaQuiropracticaResource($cita);
    }

    public function destroy($id)
    {
        Cita::findOrfail($id)->delete();
        return ['estatus' => true]
    }

}
