@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Суды'])

    @include('sidebar')

    <admin-courts></admin-courts>
@endsection
