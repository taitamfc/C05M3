@extends('layouts.admin')

@section('title') 
Cập nhật sản phẩm
@endsection

@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="box">
         <!-- /.box-header -->
         <div class="box-body">
            <form action="{{ route('products.update', $item->id) }}" method="POST" role="form">
               @csrf
               @method('PUT')
              <div class="box-body">

                <div class="form-group">
                  <label for="name">Tên</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                </div>

                <div class="form-group">
                  <label for="category_id">Chọn danh mục</label>
                  <select name="category_id" class="form-control">
                  		@foreach( $categories as $category_id => $category_name )
                  			<option 
                  			<?= ($category_id == $item->category_id) ? 'selected' : ''; ?>
                  			value="{{ $category_id }}">{{ $category_name }}</option>
                  		@endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="category_id">Chọn thẻ</label>

                  <br>
                 	@foreach( $tags as $tag_id => $tag_name )
                 		<label for="tag_{{ $tag_id }}"> 
                 			{{ $tag_name }}
                 			<input type="checkbox" 
                 			<?= ( in_array( $tag_id, $selected_tags ) ) ? 'checked' : ''; ?>
                 			name="tags[]" value="{{ $tag_id }}" id="tag_{{ $tag_id }}" class="form-checkbox">
                 		</label>
          			@endforeach


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