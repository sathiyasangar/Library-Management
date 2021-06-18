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
        <h4 class="card-title">Book</h4>
        
        @if($user_role == 1)
        <p class="card-description" align="right"><a href="bulkupload"><button type="button" class="btn btn-primary btn-fw">Bulk Upload</button></a>&nbsp;&nbsp;
                <a href="addbook"><button type="button" class="btn btn-primary btn-fw">Add Books</button></a></p>
        @endif
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
                  <a href="{{ url('/bookedit/'.'Book'.Crypt::encrypt($value->id)) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Book"><i class="menu-icon mdi mdi-table-edit" data-feather="edit" style="height:15px;width:15px"></i></a>&nbsp;&nbsp;&nbsp;
                  <a href="" data-id="{{ $value->id }}" class="delete_book" data-toggle="tooltip" data-placement="bottom" title="Delete Book"><i class="menu-icon mdi mdi-delete" data-feather="trash" style="height:15px;width:15px"></i></a>
                </td>
                @else
                <td><a href="" data-id="{{ $value->id }}" class="subscribe_book" data-toggle="tooltip" data-placement="bottom" title="Subscribe Book"><button type="button" class="btn btn-success btn-fw">Subscribe</button></td>
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




<!-- Modal -->
<div class="modal fade" id="book_delete" tabindex="-1" role="dialog" aria-labelledby="book_delete_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="book_delete">Delete Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure To Delete This Book
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="" class="btn btn-primary delete_data_btn">Delete</a>
      </div>
    </div>
  </div>
</div>



<!-- Subscribe Modal -->
<div class="modal fade" id="subscribe_book" tabindex="-1" role="dialog" aria-labelledby="subscribe_book_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="subscribe_book">Subscribe Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure To Subscribe This Book
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="" class="btn btn-success delete_data_btn">Subscribe</a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click", '.delete_book', function(e){
      e.preventDefault();
      var delete_id = $(this).attr('data-id');
      $('#book_delete').modal();
      var url = "{{ url('bookdelete/')}}/" + delete_id;
      $('.delete_data_btn').attr('href', url);
    });
  });
  </script>
  <!-- subscribe book -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click", '.subscribe_book', function(e){
      e.preventDefault();
      var subscribe_id = $(this).attr('data-id');
      $('#subscribe_book').modal();
      var url = "{{ url('subscribe/')}}/" + subscribe_id;
      $('.delete_data_btn').attr('href', url);
    });
  });
  </script>
@endpush

@push('custom-scripts')
@endpush