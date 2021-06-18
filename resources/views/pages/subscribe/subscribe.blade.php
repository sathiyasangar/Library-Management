@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
@php
  $user_role = Auth::user()->role;
@endphp

@if (Session::has('update'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{ Session::get('update') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if (Session::has('delete'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{ Session::get('delete') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if (Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if (Session::has('subscribe'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Subscribe</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>S. No</th>
                <th>Book</th>
                <th>Author</th>
                <th>Publication</th>
                @if($user_role == 1)
                <th>Action</th>
                @else
                <th>Subscrition</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @if($query->count())
              @foreach($query as $key => $value)
              <tr>
                <td>{{$key+++1}}</td>
                <td>{{$value->book}}</td>
                <td>{{$value->author}}</td>
                <td>{{$value->publication}}</td>
                @if($user_role == 1)
                <td>
                  
                </td>
                @else
                  
                <td><a href="" data-id="{{ $value->id }}" class="unsubscribe_book" data-toggle="tooltip" data-placement="bottom" title="Unsubscribe Book"><button type="button" class="btn btn-danger btn-fw">Unsubscribe</button></td>
                @endif
              </tr>
              @endforeach
              @else
              <tr>
                  <td class="text-center" colspan="5">No Records Found..!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Unsubscribe Modal -->
<div class="modal fade" id="unsubscribe_book" tabindex="-1" role="dialog" aria-labelledby="unsubscribe_book_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="unsubscribe_book">Unsubscribe Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure To Unsubscribe This Book
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="" class="btn btn-danger delete_data_btn">Unsubscribe</a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click", '.unsubscribe_book', function(e){
      e.preventDefault();
      var subscribe_id = $(this).attr('data-id');
      $('#unsubscribe_book').modal();
      var url = "{{ url('unsubscribe/')}}/" + subscribe_id;
      $('.delete_data_btn').attr('href', url);
    });
  });
  </script>
@endpush

@push('custom-scripts')
@endpush