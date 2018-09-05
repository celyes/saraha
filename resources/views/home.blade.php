@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Messages</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    @foreach ($messages as $message)
                        <div class="message mx-4 mb-4 mt-2 pb-4">
                            <div class="message-body">
                                <p>{{\Carbon\Carbon::parse($message->created_at)->diffForHumans()}}</p>
                                <h4>{{$message->body}}</h4>
                                <a href="/delete/{{$message->id}}" class="btn btn-sm btn-danger">Delete this message</a>  
                            </div>
                        </div>
                        <div class="divider"></div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
