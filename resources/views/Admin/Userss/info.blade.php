@extends("admin/AdminPublic/adminpublic")
@section('title','会员详情列表')
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
@section('content')

   <div class="mws-panel grid_8">
      <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>会员详情列表</span>
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
            <form action="/adminuserss" method="get">
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
               <label>
                  <input type="text" aria-controls="DataTables_Table_1" name="keywords" placeholder="请输入关键词">
               </label>
               <input type="submit" value="搜索">
            </div>
            </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
               <thead>
               <tr role="row">
                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">ID</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 211px;">爱好</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">性别</th>

               </tr>
               </thead>
               <tbody role="alert" aria-live="polite" aria-relevant="all">

               <tr class="odd">
                  <td class="  sorting_1" style="text-align:center">{{$info->id}}</td>
                  <td class=" " style="text-align:center">{{$info->hobby}}</td>
                  <td class=" " style="text-align:center">{{$info->sex}}</td>

               </tr>

               </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
            <div class="dataTables_paginate paging_full_numbers" id="pages">

            </div>
         </div>
      </div>
   </div>

@endsection


