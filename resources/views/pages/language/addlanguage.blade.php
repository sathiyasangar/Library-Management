@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ route('languageinsert') }}">
        @csrf
        @if(!isset($language))
        <h4 class="card-title">Add Language</h4>
        @else
        <h4 class="card-title">Update Language</h4>
        @endif
        <div class="form-group col-lg-12 text-center" >
            <div class="input-group" >
              @if(!isset($language))
              <input type="text" class="form-control text-center" name="language" required placeholder="Language">
              @else
              <input type="text" class="form-control" id="" value="{{$language->language}}" name ="language" placeholder="Enter Language">
              @endif
            </div>
        </div>

        <div class="form-group  col-lg-12">
            @if(!isset($language))
            <button type="submit" class="btn btn-primary submit-btn btn-block text-center">Submit</button>
            @else
            <input type="hidden" value="<?php echo $language->id;?>" name="id">
            <button type="submit" class="btn btn-primary submit-btn btn-block text-center">Update</button>
            @endif
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush