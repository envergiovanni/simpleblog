@extends('layouts.frontend.app')

@section('content')
    <div class="col-md-8">
        <br>
        @include('layouts.frontend._success')
        @include('layouts.frontend._error')
        <h1 class="my-4">Contáctenos</h1>
        <hr>
        <form action="{{ route('send.contact.form') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Escriba su email">
                </div>
            </div>
            <div class="form-group row">
                <label for="subject" class="col-sm-2 col-form-label">Asunto</label>
                <div class="col-sm-10">
                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Escriba un asunto">
                </div>
            </div>
            <div class="form-group row">
                <label for="body" class="col-sm-2 col-form-label">Contenido</label>
                <div class="col-sm-10">
                    <textarea name="body" id="body" class="form-control" rows="8" placeholder="Escriba su consulta"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary float-right">Enviar mensaje</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('sidebar')
    <div class="col-md-4">
        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header">First Widget</h5>
            <div class="card-body">
                You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header">Second Widget</h5>
            <div class="card-body">
                You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
        </div>
    </div>
@endsection
