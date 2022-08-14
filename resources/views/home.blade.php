@extends('layouts.app')

@section('title', 'Design.pro - Личный кабинет')

@section('header')
    @parent
@endsection

@section('content')
    <div id="myRequests">
        <div class="container">
            <div class="section-title">
                <h2 class="underline">My requests</h2>
            </div>
            <div class="new-request">
                <a href="{{ route('requests.create') }}" class="new-request-link underline">New request</a>
            </div>
            @if(count($designRequests) > 0)
                <div class="requests">
                    @foreach($designRequests as $designRequest)
                        <div class="request">
                            <div class="request-img">
                                <img src="{{ $designRequest->image }}" alt="request image" class="request-preview">
                                <img src="{{ $designRequest->image }}" alt="request scheme" class="request-scheme">
                            </div>
                            <p class="request-name">{{ $designRequest->name }}</p>
                            <p class="request-status">{{ $designRequest->status }}</p>
                            <div class="request-category">{{ $designRequest->category }}</div>
                            <div class="request-time">{{ date('d.m.Y', strtotime($designRequest->created_at)) }}</div>
                            <div class="controls">
                                <a class="control-link delete-link">Delete</a>
                                <form action="{{ route('requests.destroy', ['designRequest' => $designRequest->id]) }}"
                                      id="deleteRequest" method="post">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="section-title">
                    <h2>You don't have requests</h2>
                </div>
            @endif
        </div>
    </div>

    <script>
        $('.delete-link').click(function () {
            $('#deleteRequest').submit();
        })
    </script>
@endsection
