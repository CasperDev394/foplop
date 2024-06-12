@extends('layouts.app')

@section('content')

    @include('header')

    <div class="container page">
        <div class="register-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <register></register>
            </form>
        </div>
    </div>

    @include('footer')

@endsection
