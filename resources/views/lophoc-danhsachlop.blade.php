@extends('master')
@section('head')
<title>DEMO20 | Danh sách lớp</title>
<link rel="stylesheet" href="{{secure_asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @if (session('success'))
        <div class="row"><div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i> Thành công!</h5> {{ session('success') }}
          </div>
        </div></div>
        @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DANH SÁCH HỌC VIÊN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách học viên</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lớp {{$lophoc->ten}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Ưu đãi</th>
                  <th>Học phí</th>
                  <th>Đã thu</th>
                  <th>Chưa thu</th>
                  <th>Tình trạng học phí</th>
                </tr>
                </thead>
                <tbody>
                @foreach($danhsachs as $data)
                <tr>
                  <td><a href="/xemkhachhang/{{$data->rlsKhachhang->id}}">{{$data->rlsKhachhang->ten}}</a></td>
                  <td><a href="tel:{{$data->rlsKhachhang->sdt}}">{{$data->rlsKhachhang->sdt}}</a></td>
                  <td>{{$data->uudai}}%</td>
                  <td>{{MoneyFormat($data->rlsLophoc->hocphi*(1-$data->uudai/100))}}</td>
                  <td>{{MoneyFormat($data->dadong)}}</td>
                  <td>
                    @if(($data->rlsLophoc->hocphi*(1-$data->uudai/100)) - $data->dadong <= 0)
                    <span class="badge bg-success">HOÀN THÀNH</span>
                    @else
                    {{MoneyFormat(($data->rlsLophoc->hocphi*(1-$data->uudai/100)) - $data->dadong)}}</td>
                    @endif
                  </td>
                  <td>
                    <div class="btn-group">
                      <a href="/suahocvien/{{$data->id}}" class="btn btn-primary">Sửa</a>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="/xoahocvien/{{$data->id}}">Xóa khỏi lớp</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop

@section('script')
<script src="{{secure_asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{secure_asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        "order": [[ 0, "desc" ]],
        "language": {
        	"sProcessing":   "Đang xử lý...",
        	"sLengthMenu":   "Xem _MENU_ mục",
        	"sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
        	"sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        	"sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
        	"sInfoFiltered": "(được lọc từ _MAX_ mục)",
        	"sInfoPostFix":  "",
        	"sSearch":       "Tìm:",
        	"sUrl":          "",
        	"oPaginate": {
        		"sFirst":    "Đầu",
        		"sPrevious": "Trước",
        		"sNext":     "Tiếp",
        		"sLast":     "Cuối"
        	}
        }
    });
  });

</script>
@stop