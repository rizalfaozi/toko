<table id="example" class="table table-striped table-bordered" style="width:100%" >
    <thead>
        <tr>
        <th>Photo</th>
        <th>Username</th>
        <th>Email</th>
        <th>Telp</th>
        <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($admins as $admins)
  
        <tr>
            <td><img width="50" height="50"  src="@if(isset($admins) ? $admins->photo != '' : false){!! $admins->photo !!}@else {{ asset('img/default.png') }}  @endif" />
            </td>
       
            <td>{!! $admins->name !!}</td>            
            <td>{!! $admins->email !!}</td>
            <td>{!! $admins->phone !!}</td>
            
            
            <td> @if($admins->status>0)
               Aktif
             @else
                Non Aktif
             @endif</td>
            <td>
                {!! Form::open(['route' => ['admins.destroy', $admins->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admins.show', [$admins->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! url('admins/'.$admins->id.'/edit') !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<style type="text/css">
    #example_paginate .pagination{
         margin: 0px 0;
         position: relative;
         top:-6px;
        float: right;
    }   
</style>