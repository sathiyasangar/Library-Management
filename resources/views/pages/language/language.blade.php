@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

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

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Language</h4>
        <p class="card-description" align="right"><a href="addlanguage"><button class="btn btn-primary btn-fw">Add Language</button></a></p>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>S. No</th>
                <th>Language</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if($query->count())
              @foreach($query as $key => $value)
              <tr>
                <td>{{$key+++1}}</td>
                <td>{{$value->language}}</td>
                <td>
                  <a href="{{ url('/languageedit/'.'Lang'.Crypt::encrypt($value->id)) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Language"><i class="menu-icon mdi mdi-table-edit" data-feather="edit" style="height:15px;width:15px"></i></a>&nbsp;&nbsp;&nbsp;
                  <a href="" data-id="{{ $value->id }}" class="delete_language" data-toggle="tooltip" data-placement="bottom" title="Delete Language"><i class="menu-icon mdi mdi-delete" data-feather="trash" style="height:15px;width:15px"></i></a>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                  <td class="text-center" colspan="4">No Records Found..!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-inner mt--5">
  <div class="row mt--2">
      <div class="col-md-12">
        <div class="row">
            <div class=" form-group col-md-5">Total Counts : {{$query->total()}}</div>
            <div class="form-group col-md-7" >
              <span  style="float:right;">
                  {{ $query->appends($_GET)->links('pagination::bootstrap-4') }}
              </span>
            </div>
        </div>
      </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="language_delete" tabindex="-1" role="dialog" aria-labelledby="language_delete_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="language_delete">Delete Language</h5>
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
@endsection

@push('plugin-scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click", '.delete_language', function(e){
      e.preventDefault();
      var delete_id = $(this).attr('data-id');
      $('#language_delete').modal();
      var url = "{{ url('languagdelete/')}}/" + delete_id;
      $('.delete_data_btn').attr('href', url);
    });
  });
  </script>
@endpush

@push('custom-scripts')
@endpush