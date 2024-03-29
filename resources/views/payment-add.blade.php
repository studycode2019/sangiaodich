@extends('master')
@section('head')
<title>SYS BDS</title>
<link rel="stylesheet" href="{{secure_asset('plugins/select2/select2.min.css')}}">
@stop
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1>NHẬP PHIẾU CHI</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Nhập phiếu chi</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    @if (count($errors) > 0) 
    @foreach ($errors->all() as $error) 
    <div class="col-md-12">
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-ban"></i> Thất bại!</h5>
        {!! $error !!}
      </div>
    </div>
    @endforeach
    @endif
    <div class="row offset-3">
    <!-- general form elements -->
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Nhập thông tin phiếu chi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('staff.payment.add.post')}}" method="post">
          {{csrf_field()}}
          <div class="card-body">
            <div class="form-group">
              <label for="inputSostt">Tên người nhận:</label> {{$client -> name}}   |   
              <label for="inputSostt">Số Điện Thoại:</label> {{$client -> phone}}    |    
              <label for="inputSostt">Ngày Sinh:</label> {{$client -> birthday}}
              <input name="client_id" type="hidden" class="form-control" value="{{$client->id}}">
            </div>
            <div class="form-group">
              <label for="content">Nội dung chi:</label>
              <input name="content" type="text" class="form-control" id="content" placeholder="Ví dụ: Chi mua trà sữa" autofocus required>
            </div>
            <div class="form-group">
              <label for="amount">Số tiền:</label>
              <input name="amount" type="number" class="form-control" id="amount" placeholder="Nhập vào số tiền" required>
            </div>
            <div class="form-group">
              {{-- <label for="branch_id" style="color: #ff0505;"><i>Từ ngày 13/9/2019, người lập phiếu chịu trách nhiệm nhập lên hệ thống</i> --}}
              <br>Chi nhánh:</label>
              <select name="branch_id" id="branch_id" class="form-control select2" style="width: 100%;">
                @foreach ($branches as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="field_id">Danh muc thu:</label>
              <select name="field_id" id="inputPhieuthuDanhmuc" class="form-control select2" style="width: 100%;">
                @foreach ($fields as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="note">Ghi chú:</label>
              <input name="note" type="text" class="form-control" id="note" placeholder="Nội dung ghi chú">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-6 text-right">
                  <button type="submit" class="btn btn-primary">Thêm vào</button>
              </div>
              <div class="col-6">
                  <button type="submit" class="btn btn-secondary"><a onclick="history.go(-1);">Quay lại</a></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
@section('script')
<!-- Select2 -->
<script src="{{secure_asset('plugins/select2/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@stop