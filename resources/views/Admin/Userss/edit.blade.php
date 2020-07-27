@extends("admin/AdminPublic/adminpublic")
@section('title','用户添加')
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
    <span>
      <i class="icon-pencil"></i>会员修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/adminuserss/{{$user->id}}" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">会员名</label>
                        <div class="mws-form-item">
                            <input type="text" class="large" name="name" value="{{$user->name}}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item">
                            <ul class="mws-form-list">
                                <li style="float:left">
                                    <input id="gender_male"
                                           type="radio" @if($user->status == 1)checked="checked"@endif name="status" class="required" value="1">
                                    <label for="gender_male">开启</label></li>
                                <li style="float:left;margin-left:10px;">
                                    <input id="gender_female" type="radio" name="status" @if($user->status == 0)checked="checked"@endif value="0">
                                    <label for="gender_female">禁用</label></li>
                                <li style="float:left;margin-left:10px;">
                                    <input id="gender_female" type="radio" name="status" @if($user->status == 2)checked="checked"@endif value="2">
                                    <label for="gender_female">审核中</label></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="mws-button-row">
                    {{csrf_field()}}
                    {{method_field("PUT")}}
                    <input type="submit" value="Submit" class="btn btn-danger">
                    <input type="reset" value="Reset" class="btn ">
                </div>
            </form>
        </div>
    </div>
@endsection