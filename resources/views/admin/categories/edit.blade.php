@extends('layouts.admin')

@section('title') 
Cập nhật danh mục
@endsection

@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="box">
         <!-- /.box-header -->
         <div class="box-body">
            <form action="{{ route('categories.update',$item->id) }}" method="POST" role="form">
               @method('PUT')
               @csrf
              <div class="box-body">

                <div class="form-group">
                  <label for="name">Tên</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                </div>
                <div class="form-group">
                  <label for="description">Mô Tả</label>
                  <textarea name="description" id="description" class="form-control">{{ $item->description }}</textarea>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
              </div>
            </form>
         </div>
         <!-- /.box-body -->
      </div>
   </div>
</div>
@endsection