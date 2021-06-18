@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ route('bookinsert') }}">
        @csrf
        @if(!isset($book))
        <h4 class="card-title">Add Book</h4>
        @else
        <h4 class="card-title">Update Book</h4>
        @endif
        
        <div class="form-group col-lg-12 text-center" >
            <div class="input-group" >
              @if(!isset($book))
              <input type="text" class="form-control text-center" name="book" required placeholder="Book">
              @else
              <input type="text" class="form-control text-center" id="" value="{{$book->book}}" name ="book" placeholder="Enter Book">
              @endif
            </div>
        </div>
        
        <div class="form-group col-lg-12 text-center" >
            <div class="input-group" >
              @if(!isset($book))
              <input type="text" class="form-control text-center" name="author" required placeholder="Author">
              @else
              <input type="text" class="form-control text-center" id="" value="{{$book->author}}" name ="author" placeholder="Enter Author">
              @endif
            </div>
        </div>
        
        <div class="form-group col-lg-12 text-center" >
            <div class="input-group" >
              @if(!isset($book))
              <input type="text" class="form-control text-center" name="publication" required placeholder="publication">
              @else
              <input type="text" class="form-control text-center" id="" value="{{$book->publication}}" name ="publication" placeholder="Enter Language">
              @endif
            </div>
        </div>

        <div class="form-group col-lg-12 text-center" >
            <select class="col-lg-12 "  name ="language"  placeholder="Language" value="">
              <option selected disabled>Select language</option>
              @foreach ($languages as $lan)
                <option @if(isset($book) && $book->language == $lan->id) selected='selected' @endif value="{{$lan->id}}">{{$lan->language}}</option>
              @endforeach
            </select>
        </div>
        <br>
        <div class="form-group  col-lg-12">
            @if(!isset($book))
            <button type="submit" class="btn btn-primary submit-btn btn-block text-center">Submit</button>
            @else
            <input type="hidden" value="<?php echo $book->id;?>" name="id">
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