@extends('layouts.app')

@section('title', 'Design.pro - Личный кабинет')

@section('header')
    @parent
@endsection

@section('content')
    <div id="myRequests">
        <div class="container">
            <div class="section-title">
                <h2 class="underline">All requests</h2>
            </div>
            @if(count($requests) > 0)
                <div class="requests">
                    @foreach($requests as $designRequest)
                        <div class="request">
                            <div class="request-img">
                                <img src="{{ $designRequest->image }}" alt="request image" class="request-preview">
                                @if ($designRequest->design)
                                    <img src="{{ $designRequest->design }}" alt="request scheme" class="request-scheme">
                                @endif
                            </div>
                            <p class="request-name">{{ $designRequest->name }}</p>
                            <p class="request-status">{{ $designRequest->status }}</p>
                            <div class="request-category">{{ $designRequest->category }}</div>
                            <div
                                class="request-time">{{ date('d.m.Y H:i:s', strtotime($designRequest->created_at)) }}</div>
                            <div class="controls">
                                <a href="{{ route('requests.edit', $designRequest) }}" class="control-link edit-link">Edit</a>
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
                    <h2>There are no requests</h2>
                </div>
            @endif
        </div>
    </div>

    <script>
        $('.delete-link').click(function () {
            $('#deleteRequest').submit();
        })

        $('.request-status').each(function () {
            if ($(this).text() === 'New') {
                $(this).addClass('color-blue')
            } else if ($(this).text() === 'In process') {
                $(this).addClass('color-yellow')
            } else if ($(this).text() === 'Completed') {
                $(this).addClass('color-green')
            }
        })
    </script>
@endsection
