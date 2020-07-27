@extends("admin/AdminPublic/adminpublic")
@section('title','会员列表')
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
@section('content')

   <div class="mws-panel grid_8">
      <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>用户列表</span>
      </div>
      <div class="mws-panel-body no-padding">
         <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div id="DataTables_Table_1_length" class="dataTables_length">
               <label>Show
                  <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1">
                     <option value="10" selected="selected">10</option>
                     <option value="25">25</option>
                     <option value="50">50</option>
                     <option value="100">100</option></select>entries</label>
            </div>
            <form action="/adminusers" method="get">
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
               <label>
                  <input type="text" aria-controls="DataTables_Table_1" name="keywords">
               </label>
               <input type="submit" value="搜索">
            </div>
            </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
               <thead>
               <tr role="row">
                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">ID</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 211px;">用户名</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">密码</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 134px;">邮箱</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 134px;">状态</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                      rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">电话</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                      rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 120px;">操作</th>
               </tr>
               </thead>
               <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($data as $row)
               <tr class="odd">
                  <td class="  sorting_1" style="text-align:center">{{$row->id}}</td>
                  <td class=" " style="text-align:center">{{$row->username}}</td>
                  <td class=" " style="text-align:center">{{$row->password}}</td>
                  <td class=" " style="text-align:center">{{$row->email}}</td>
                  <td class=" " style="text-align:center">@if($row->status == 1)开启@else禁用@endif</td>
                  <td class=" " style="text-align:center">{{$row->phone}}</td>
                  <td >
                     <form action="/adminusers/{{$row->id}}" method="post">
                        <button type="submit">普通删除</button>
                        {{csrf_field()}}
                        {{method_field("DELETE")}}
                     </form>
                     <a href="/adminusers/{{$row->id}}/edit" class="btn btn-info">修改</a>
                  </td>
               </tr>
             @endforeach
               </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
            <div class="dataTables_paginate paging_full_numbers" id="pages">
               {{$data->appends($request)->render()}}
            </div>
         </div>
      </div>
   </div>

@endsection


