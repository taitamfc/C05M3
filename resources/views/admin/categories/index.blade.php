@extends('layouts.admin')

@section('title') 
{{ __('messages.manage_categories',[ 'name' => 'Sản phẩm' ]) }} - {{ trans_choice('messages.count_items', 1) }}
@endsection

@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="box">
         <!-- /.box-header -->
         <div class="box-body">
            <table class="table table-bordered">
               <tbody>
                  <tr>
                     <th style="width: 10px">#</th>
                     <th>{{ __('messages.col_name') }}</th>
                     <th>{{ __('messages.col_created') }}</th>
                     <th>{{ __('messages.col_action') }}</th>
                  </tr>
                  @foreach( $items as $item )
                  <tr>
                     <td>{{ $item->id }}</td>
                     <td>{{ $item->name }}</td>
                     <td>{{ $item->created_at }}</td>
                     <td>
                        <a href="{{ route('categories.edit',$item->id) }}" class="badge bg-light-blue">Sửa</a>

                        <a href="#" class="badge bg-red">Xóa</a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         <!-- /.box-body -->
         <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
               <li><a href="#">«</a></li>
               <li><a href="#">1</a></li>
               <li><a href="#">2</a></li>
               <li><a href="#">3</a></li>
               <li><a href="#">»</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
@endsection