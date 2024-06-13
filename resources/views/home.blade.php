@extends('layouts.app',
    [
        'title' => 'Торги по банкротству, продажа имущества должников',
        'description' => 'Самое полное собрание торгов по банкротству. Собрали все торги, для вас, в одном месте на FopLop.ru'
    ]
)

@section('content')

    @include('header')

    <home></home>

    @include('footer')

@endsection
