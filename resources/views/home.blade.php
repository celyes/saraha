@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('deleted'))
                <div class="alert alert-success" role="alert">
                    {{session('deleted')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Welcome, {{Auth::user()->name}}
                </div>

                <div class="card-body">
                    {{$messages->links()}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    @if($messages->count())
                    @foreach ($messages as $message)
                        <div class="col-md-11 message mx-4 mb-4 mt-2 pb-4">
                            <div class="message-body">
                                <p>{{\Carbon\Carbon::parse($message->created_at)->diffForHumans()}}</p>
                                <h4>{{$message->body}}</h4>
                                <form class="delete"  onsubmit="return confirm('Are you sure? this cannot be undone');" action="/home/delete/{{$message->id}}"  method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger">Delete this message</button>
                                </form>
                            </div>
                            
                        </div>
                    @endforeach
                    @else
                    <div class="col-md-11 mx-4 mb-1 mt-4 pb-4">
                        <h4>No messages </h4>
                        See your <a href="{{route('profile')}}">profile</a> to copy the link and receive messages.  
                    </div>
                    @endif
                    </div>
                    
                    {{$messages->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

