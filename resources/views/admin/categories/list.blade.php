@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Направления'])

    @include('sidebar')

    <admin-categories></admin-categories>
@endsection
