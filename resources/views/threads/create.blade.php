@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new Thead</div>

                    <div class="card-body">
                        <form method="POST" action="/threads">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="channel_id">Choose a channel:</label>
                                <select name="channel_id" class="form-control" id="channel_id" required>
                                    <option value="">Choose one...</option>
                                    @foreach($channels as $channel)
                                        <option {{old('channel_id') == $channel->id ? 'selected' : ''}} value="{{$channel->id}}">{{$channel->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input required value="{{old('title')}}" name="title" type="text" class="form-control" id="title" placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea required value="{{old('body')}}" name="body" id="body" placeholder="Have something to say?"
                                      class="form-control" rows="8"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>

                            @if(count($errors))
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
