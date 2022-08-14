@extends('layouts.app')

@section('title', 'Design.pro - Главная')

@section('header')
    <div class="header">
        @parent
    </div>
@endsection

@section('content')
    <section id="latestRequests">
        <div class="section-title">
            <h2 class="underline">Newest requests</h2>
        </div>
        <div class="container">
            <div class="requests">
                @foreach($latestRequests as $request)
                <div class="request">
                    <div class="request-img">
                        <img src="{{ $request->image }}" alt="request image" class="request-preview">
                        <img src="{{ asset('img/pr1.jpg') }}" alt="request scheme" class="request-scheme">
                    </div>
                    <p class="request-name">{{ $request->name }}</p>
                    <div class="request-category">{{ $request->category }}</div>
                    <div class="request-time">{{ date('d.m.Y', strtotime($request->created_at)) }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="requestsCounter">
        <div class="section-title">
            <h2 class="underline">Now in process</h2>
        </div>
        <div class="container">
            <div class="counter">
                {{ $counter }}
            </div>
        </div>
    </section>

    <script>
        setInterval(function () {
            $.ajax({
                url: '{{ route('updateCounter') }}',
                data: '',
                type: 'GET',
                success: (data) => {
                    $('.counter').text(data);
                }
            })
        }, 4000)
    </script>
@endsection


