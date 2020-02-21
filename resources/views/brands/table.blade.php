<table id="example" class="table  table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
        
        <th>Nama</th>
        <th>Setting</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($brands as $brands)
       @foreach(DB::table('brands')->where(['menu_id'=>$brands->id,'setting'=>'submenu'])->get()  as $row)
        <tr>
           
       
            <td>{!! $brands->name !!}</td>

           
            <td>{!! $brands->setting !!}</td>
            <td>
                {!! Form::open(['route' => ['brands.destroy', $brands->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                  
                    <a href="{!! url('brands/'.$brands->id.'/edit') !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        <tr>
           <td>- {!! $row->name !!}</td>
           <td>{!! $row->setting !!}</td>
           <td>
                {!! Form::open(['route' => ['brands.destroy', $row->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   
                    <a href="{!! url('brands/'.$row->id.'/edit') !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>   
        @endforeach
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