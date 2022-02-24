@extends('layouts.header')
@section('body')
<!-- banner 2 -->
<div class="inner-banner-w3ls">
    <div class="container">

    </div>
    <!-- //banner 2 -->
</div>
<!-- page details -->
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('index')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Ver mis citas</li>
        </ol>
    </div>
</div>

<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Ver mis citas</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Por favor llena el siguiente formulario con tus datos para
                    para consultar tus citas.</h5>
                <form action="{{route('buscandocita')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">CURP*:</label>
                        <input type="text" class="form-control" placeholder="Ingrese su curp a 18 digitos" name="curp"
                            id="recipient-name" required="">
                    </div>
                    <input type="submit" value="Buscar mi cita" class="btn_apt">
                </form>
            </div>
        </div>
    </div>
    @endsection