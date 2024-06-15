@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Направления'])

    @include('sidebar')

    <admin-directions></admin-directions>
@endsection
