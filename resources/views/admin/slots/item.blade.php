@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Лот'])

    @include('sidebar')

    <admin-slot></admin-slot>
@endsection
