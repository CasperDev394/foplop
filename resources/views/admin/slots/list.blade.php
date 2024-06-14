@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Лоты'])

    @include('sidebar')

    <admin-slots></admin-slots>
@endsection
