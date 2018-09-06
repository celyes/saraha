@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{$errors->first()}}
                </div>
            @endif
            @if(session('updated'))
                <div class="alert alert-success">
                    {{session('updated')}}
                </div>
            @endif
            <div class="card">  
                <div class="card-header">
                Personal info
                </div>
                <form action="{{ route('updateInfo') }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">                        
                            <div class="col-md-12">
                                <div class="alert alert-info pt-4">
                                    <p>This is the link where people can send you message<br> 
                                    <a href="{{url('/')}}/{{$userInfo['username']}}">{{url('/')}}/{{$userInfo['username']}}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row my-0"> 
                            <div class="col-md-8 offset-md-3">
                                <p class="text-primary mt-2 ">Basic information</p>
                            </div>
                        </div>
                        <div class="form-group row">                        
                            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{$userInfo['name']}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">                        
                            <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>
                            <div class="col-md-8">
                                <input id="username" type="text" class="form-control" name="username" value="{{$userInfo['username']}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">                        
                            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control" name="email" value="{{$userInfo['email']}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row my-0"> 
                            <div class="col-md-8 offset-md-3">
                                <p class="text-primary mt-2">Other information</p>
                            </div>
                        </div>
                        <div class="form-group row">                        
                            <label for="country" class="col-md-3 col-form-label text-md-right">Country</label>
                            <div class="col-md-8">
                                @include('layouts.countries')
                                <small>Current country : {{$country}}</small>
                            </div>
                        </div>
                        <div class="form-group row">                        
                            <label for="gender" class="col-md-3 col-form-label text-md-right">Gender</label>
                            <div class="col-md-8">
                                @include('layouts.gender')
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-3 offset-md-8 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection