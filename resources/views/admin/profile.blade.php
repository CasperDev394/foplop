@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Профиль'])

    @include('sidebar')

    <admin-profile></admin-profile>
@endsection
