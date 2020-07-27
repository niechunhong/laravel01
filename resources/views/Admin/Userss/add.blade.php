@extends("admin/AdminPublic/adminpublic")
@section('title','用户添加')
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
    <span>
      <i class="icon-pencil"></i>会员添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/adminuserss" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">用户名</label>
                        <div class="mws-form-item">
                            <input type="text" class="large" name="name"></div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="large" name="password"></div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label" >确认密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="large" value="" name="repassword"></div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item">
                            <ul class="mws-form-list">
                                <li style="float:left">
                                    <input id="gender_male" type="radio" value="1" name="status" class="required">
                                    <label for="gender_male">开启</label></li>
                                <li style="float:left">
                                    <input id="gender_male" type="radio" value="2" name="status" class="required">
                                    <label for="gender_male">审核中</label></li>
                                <li style="float:left;margin-left:10px;">
                                    <input id="gender_female" type="radio" name="status" checked="checked" value="0">
                                    <label for="gender_female">禁用</label></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="mws-button-row">
                    {{csrf_field()}}
                    <input type="submit" value="Submit" class="btn btn-danger">
                    <input type="reset" value="Reset" class="btn ">
                </div>
            </form>
        </div>
    </div>
@endsection