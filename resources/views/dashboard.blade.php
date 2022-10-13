@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <x-adminlte-card theme="dark" theme-mode="outline" style="height: 100%">
                <button data-toggle="modal" data-target="#modalCustom" class="bg-teal button-modal" style="height: 50px;">
                    <i class="fa fa-solid fa-plus fa-2x" style="justify-items: center; align-items: center"></i> </button>
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                      This is some text within a card body.
                    </div>
                  </div>
            </x-adminlte-card>
        </div>
        <div class="col-md-4">
            <x-adminlte-card theme="dark" theme-mode="outline" style="height: 100%">
                <button data-toggle="modal" data-target="#modalCustom" class="bg-teal button-modal" style="height: 50px;">
                    <i class="fa fa-solid fa-plus fa-2x" style="justify-items: center; align-items: center"></i> </button>
            </x-adminlte-card>
        </div>
        <div class="col-md-4">
            <x-adminlte-card theme="dark" theme-mode="outline" style="height: 100%">
                <button data-toggle="modal" data-target="#modalCustom" class="bg-teal button-modal" style="height: 50px;">
                    <i class="fa fa-solid fa-plus fa-2x" style="justify-items: center; align-items: center"></i> </button>
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <style>
        .button-modal {
            background-color: #258d25;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
            height: 100%;
            width: 100%;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
