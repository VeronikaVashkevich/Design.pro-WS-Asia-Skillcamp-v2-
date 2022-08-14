@extends('layouts.app')

@section('title', 'Design.pro - Sign up')

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="section-title">
            <h2>Sign up</h2>
        </div>
        <div class="form">
            <form action="{{ route('signUp') }}" method="post">
                @csrf
                <div class="form-field">
                    <label for="name" class="form-label">First name and last name</label>
                    <input type="text" id="name" class="form-control" name="name">
                    @error('name')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" id="login" class="form-control" name="login">
                    @error('login')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
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
                    <label for="password_confirm" class="form-label">Confirm password</label>
                    <input type="password" id="password_confirm" class="form-control" name="password_confirm">
                    @error('password_confirm')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field form-field-row">
                    <label for="confirm" class="form-label">I agree to the processing of personal data</label>
                    <input type="checkbox" name="confirm" id="confirm" class="form-control" checked>
                    @error('confirm')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <button type="submit" class="btn-submit">Sign up</button>
                </div>
            </form>
        </div>
    </div>
@endsection
