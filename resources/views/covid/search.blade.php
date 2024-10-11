@extends('layouts.app')

@section('content')
<div class="user-store w-50 m-auto border p-2 mt-5">
    <h4 class="text-center fw-bold mt-1 mb-1">Check Vaccin Status</h4>
    <hr class="w-50 text-center m-auto mb-2">
    <form method="POST" action="{{route('covid.search')}}">
        @csrf
        <div class="mb-3">
          <label class="form-label">NID Number</label>
          <input type="number" class="form-control" name="nid_no" value="{{ old('nid_no') }}">
            @if($errors->has('nid_no'))
                <div class="error text-danger">{{ $errors->first('nid_no') }}</div>
            @endif
        </div>
          
        <button type="submit" class="btn btn-primary text-center m-auto d-block">Submit</button>
    </form>

</div>

@if(session('status'))
    <div class="vaccin-status">{{ session('status') }}</div>
@endif

@endsection