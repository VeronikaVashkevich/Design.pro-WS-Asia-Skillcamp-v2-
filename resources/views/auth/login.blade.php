@extends('layouts.app')

@section('title', 'Design.pro - Sign in')

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="section-title">
            <h2>Sign in</h2>
        </div>
        <div class="form">
            <form action="{{ route('signIn') }}" method="post">
                @csrf
                <div class="form-field">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" class="form-control" name="email">
                    @error('email')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" name="password">
                    @error('password')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <button type="submit" class="btn-submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>
@endsection
