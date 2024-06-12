@extends('layouts.app')

@section('content')

    @include('header')

    <div class="container page">
        <div class="login-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <login></login>
            </form>
        </div>
    </div>

    @include('footer')

@endsection
