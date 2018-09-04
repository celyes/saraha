@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Write a message to {{$user[0]}} </div>

                <div class="card-body">

                    <form action="/create" method="POST">
                        {{ csrf_field()}}
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="body" id="body" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>    
                
                </div>
            </div>
        <div>
    </div>
</div>
@endsection