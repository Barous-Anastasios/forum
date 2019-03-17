@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <a href="{{route('profile', $thread->creator)}}">
                                    {{$thread->creator->name}}
                                </a> posted:
                                {{$thread->title}}
                            </span>

                            @can('update', $thread)
                                <form action="{{$thread->path()}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button type="submit" class="btn btn-link">Delete Thread</button>
                                </form>
                            @endcan
                        </div>

                    </div>

                    <div class="card-body">
                        {{$thread->body}}
                    </div>
                </div>

                <br>

                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                    <br>
                @endforeach

                {{$replies->links()}}

                <br>

                @if(auth()->check())
                    <form method="POST" action="{{$thread->path() . '/replies'}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea name="body" id="body" placeholder="Have something to say?"
                                      class="form-control" rows="5"></textarea>

                            <br>

                            <button type="submit" class="btn btn-primary">POST</button>
                        </div>
                    </form>
                @else
                    <p class="text-center">
                        Please
                        <a href="{{route('login')}}">sign in</a>
                        to participate in this discussion.
                    </p>
                @endif
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        This thread was published {{$thread->created_at->diffForHumans()}} by
                        <a href="">{{$thread->creator->name}}</a>, and currently has
                        {{$thread->replies_count}} {{Str::plural('comment', $thread->replies_count)}}.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

