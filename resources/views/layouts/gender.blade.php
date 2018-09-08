@php 
$gender = array(
    'male',
    'female',
    'other'
)
@endphp

<select id="gender" type="text" class="form-control" name="gender" required>
    @foreach($gender as $value)
    <option value="{{$value}}" @if(Auth::check()){{Auth::user()->gender ==$value ? 'selected' : ''}}@endif >{{$value}}</option>
    @endforeach
    
</select>