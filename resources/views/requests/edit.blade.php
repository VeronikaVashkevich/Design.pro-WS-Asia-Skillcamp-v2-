@extends('layouts.app')

@section('title', 'Design.pro - Sign in')

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="section-title">
            <h2>Update request</h2>
        </div>
        <div class="form">
            <form id="form" action="{{ route('requests.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-field">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control readonly" readonly
                           value="{{ $request->name }}">
                    @error('name')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" cols="30" rows="10" readonly
                              class="form-control readonly">{{ trim($request->description) }}</textarea>
                    @error('description')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-control readonly" disabled>
                        @foreach($categories as $category)
                            <option value="{{ $category }}"
                                    @if($category == $request->category) selected @endif>{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control readonly" readonly>
                    @error('image')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach($statuses as $status)
                            <option value="{{ $status }}"
                                    @if($status == $request->status) selected @endif>{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field design">
                    <label for="design" class="form-label">Design</label>
                    <input type="file" id="design" class="form-control" name="design">
                    @error('design')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field comment">
                    <label for="comment" class="form-label">Comment</label>
                    <input type="text" id="comment" class="form-control" name="comment" value="{{ $request->comment }}">
                    @error('comment')
                    <span class="form-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="id" value="{{ $request->id }}">
                <div class="form-field">
                    <input type="submit" class="btn-submit" value="Save">
                </div>
            </form>
        </div>
    </div>

    <script>
        $('.btn-submit').click(function () {
            console.log('submit')
            $('#form').submit();
        })

        $(document).ready(function () {
            setAvailableStatuses();

            $('#status').change(function () {
                var newStatus = $('#status').val();

                updateStatus(newStatus)
            }).change()

            function updateStatus(status) {
                switch (status) {
                    case 'New':
                        $('#comment').attr('required', false).parent().hide();
                        $('#design').attr('required', false).parent().hide();
                        console.log('new')
                        break;
                    case 'In process':
                        $('#comment').attr('required', true).parent().show();
                        $('#design').attr('required', false).parent().hide();
                        console.log('in process')
                        break;
                    case 'Completed':
                        $('#comment').attr('required', false).parent().hide();
                        $('#design').attr('required', true).parent().show();
                        console.log('completed')
                        break;
                }
            }

            function setAvailableStatuses() {
                var $status = '{{ $request->status }}';
                var statuses = {};

                switch ($status) {
                    case 'New':
                        statuses = {
                            'New': 'New',
                            'In process': 'In process',
                            'Completed': 'Completed',
                        }
                        updateAvailableStatuses(statuses);
                        break;
                    case 'In process':
                        statuses = {
                            'In process': 'In process',
                        }
                        updateAvailableStatuses(statuses);
                        break;
                    case 'Completed':
                        statuses = {
                            'Completed': 'Completed',
                        }
                        updateAvailableStatuses(statuses);
                        break;
                }

            }

            function updateAvailableStatuses(statuses) {
                var $el = $("#status");
                $el.empty(); // remove old options
                $.each(statuses, function (key, value) {
                    $el.append($("<option></option>")
                        .attr("value", value).text(key))
                });
            }
        })
    </script>
@endsection
