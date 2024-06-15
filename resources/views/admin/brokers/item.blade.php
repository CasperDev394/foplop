@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Брокер'])

    @include('sidebar')

    <admin-broker></admin-broker>
@endsection
