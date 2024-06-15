@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Брокеры'])

    @include('sidebar')

    <admin-brokers></admin-brokers>
@endsection
