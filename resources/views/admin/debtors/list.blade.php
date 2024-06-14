@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Должники'])

    @include('sidebar')

    <admin-debtors></admin-debtors>
@endsection
