@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ route('bulkinsert') }}" enctype="multipart/form-data">
        @csrf
        <h4 class="card-title">Bulk Upload</h4>
        <br>
        <div class="form-group col-lg-12 text-center" >
            <div class="input-group" >
              <input type="file" class=" text-center" name="file" required placeholder="Only CSV file">
            </div>
        </div>
        <div class="form-group  col-lg-12">
            <button type="submit" class="btn btn-primary submit-btn btn-block text-center">Submit</button>
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