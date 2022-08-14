@extends('layouts.app')

@section('title', 'Design.pro - Sign in')

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="section-title">
            <h2>New request</h2>
        </div>
        <div class="form">
            <form action="{{ route('requests.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-field">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" class="form-control" name="name">
                    @error('name')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    @error('description')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="image" class="form-label">E-mail</label>
                    <input type="file" id="image" class="form-control" name="image">
                    @error('image')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <button type="submit" class="btn-submit">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
