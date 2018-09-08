@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="my-4 font-weight-bold">Contact Us</h3>
            <p>To contact us by e-mail for non-support requests:</p>
            <p class="px-3"><em><a href="mailto:sarahah@sarahah.com">sarahah@sarahah.com</a></em></p>
            <p>Or through social networks below :)</p>
        </div>
    </div>
</div>
@endsection
@section('footer')
<footer class="page-footer contact-footer">
    <div class="footer-copyright text-center"> 
        <small>
            Sarahah &copy; {{Carbon\Carbon::now()->year}} <a href="#">Privacy</a> - <a href="#">Terms</a>
        </small>
    </div>
</footer>
@endsection