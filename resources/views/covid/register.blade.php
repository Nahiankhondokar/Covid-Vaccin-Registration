@extends('layouts.app')

@section('content')
<div class="user-store w-50 m-auto border p-2 mt-5">
    <h4 class="text-center fw-bold mt-1 mb-1">User Registration</h4>
    <hr class="w-50 text-center m-auto mb-2">
    <form method="POST" action="{{route('covid.store')}}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
              @if($errors->has('email'))
                  <div class="error text-danger">{{ $errors->first('email') }}</div>
              @endif
          </div>

          <div class="mb-3">
            <label class="form-label">Phone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
              @if($errors->has('phone'))
                  <div class="error text-danger">{{ $errors->first('phone') }}</div>
              @endif
          </div>

          <div class="mb-3">
            <label class="form-label">NID No <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="nid_no" value="{{ old('nid_no') }}">
              @if($errors->has('nid_no'))
                  <div class="error text-danger">{{ $errors->first('nid_no') }}</div>
              @endif
          </div>

          <div class="mb-3">
            <label class="form-label">Vaccin Center <span class="text-danger">*</span></label>
            <select name="vaccin_center_id" id="" class="block mt-1 form-control">
                <option value="">--Select--</option>
                @foreach ($centers as $center)
                <option value="{{$center->id}}">{{$center->name}}</option>
                @endforeach
            </select>
              @if($errors->has('vaccin_center_id'))
                  <div class="error text-danger">{{ $errors->first('vaccin_center_id') }}</div>
              @endif
          </div>

          <div class="mb-3">
            <label class="form-label">Vaccin Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="vaccin_date" value="{{ old('vaccin_date') }}">
            <small>Only Sunday or Thursday</small>
              @if($errors->has('vaccin_date'))
                  <div class="error text-danger">{{ $errors->first('vaccin_date') }}</div>
              @endif
          </div>
          
        <button type="submit" class="btn btn-primary text-center m-auto d-block">Submit</button>
    </form>
</div>
@endsection