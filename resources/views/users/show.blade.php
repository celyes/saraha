@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('sent'))
                <div class="alert alert-success">
                    {{ session('sent') }}
                </div>
            @endif
            <div class="card">  
                <div class="card-header">Write a message to {{ $user->username }}</div>

                <div class="card-body">

                    <form action="/{{$user->id}}/create" method="POST">
                        {{ csrf_field()}}
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="body" id="body" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                               <p><small>write at least 15 characters and do not exceed 1500 characters</small> </p>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>    
                    @if($errors->any())
                        <div class="alert alert-danger">
                        {{$errors->first()}}
                        </div>
                    @endif
                </div>
            </div>
        <div>
    </div>
</div>
@endsection