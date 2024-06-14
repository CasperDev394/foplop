@extends('layouts.app')

@section('content')

    @include('lk.header', ['h1'=>'ЛК Админ - Должник'])

    @include('sidebar')

    <admin-debtor></admin-debtor>
@endsection
