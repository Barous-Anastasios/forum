@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card-header">
                    <h1>
                        {{$profileUser->name}}
                    </h1>
                </div>

                @forelse($activities as $date => $activity)
                    <h3 class="card-header">
                        {{$date}}
                    </h3>

                    @foreach($activity as $record)
                        @if(view()->exists("profiles.activities.{$record->type}"))
                            @include("profiles.activities.{$record->type}", ['activity' => $record])
                        @endif
                    @endforeach
                @empty
                    There is no activity for this user yet.
                @endforelse
            </div>
        </div>
    </div>
@endsection
