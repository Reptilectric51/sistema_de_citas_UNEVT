<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CitasQuiropracticaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id ,
            'nombre'=>$this->nombre,
            'apellido_paterno'=>$this->apellido_paterno,
            'apellido_materno'=>$this->apellido_materno,
            'email'=>$this->email,
            'consultorio'=>$this->consulturio,
            'estatus'=>$this->estatus,
            'fecha'=>$this->fecha,
            'hora'=>$this->hora,
            'folio'=>$this->folio,
            'creada'=>$this->creada
        ];
    }
}
