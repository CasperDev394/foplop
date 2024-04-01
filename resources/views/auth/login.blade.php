@extends('layouts.app')

@section('content')

<div class="login-container">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <login></login>
    </form>
</div>
@endsection
