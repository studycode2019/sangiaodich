@extends('master')
@section('head')
<title>@yield('title')</title>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css')}}">
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
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách NDT</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Danh sách nhà đầu tư</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Ngày</th>
                  <th>Mã BDS</th>
                  <th>Địa chỉ</th>
                  <th>Số tiền</th>
                  <th>Số lượng</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                <a href="{{$course->id}}">
                <tr>
                  <td>{{ date("Y/m/d", strtotime($course->opening_at)) }}</td>
                  <td>{{ $course->shortname }}</td>
                  <td>{!! $course->linkName() !!}</a></td>
                  <td>{{ number_format($course->tuition,0,",",".") }}</td>
                  <td>{{ $course->lesson }}</td>
                  <td>{{ $course->schedule }}</td>
                  <td>
                    @if( !$course->isFull() )
                    <span style="width: 88px;" class="btn btn-warning">
                    @elseif( $course->isFull() )
                    <span style="width: 88px;" class="btn btn-success">
                    @elseif( $course->sum()>$course->maxseat )
                    <span style="width: 88px;" class="btn btn-danger">
                    @endif
                    {{ $course->sum() }}/{{ $course->maxseat }}</span>
                  </td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('staff.course.view.get', ['course_id' => $course->id])}}" class="btn btn-primary">Xem</a>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{route('staff.course.edit.get', ['course_id' => $course->id])}}">Sửa</a>
                      </div>
                    </div>
                  </td>
                </tr>
                </a>
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
<script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        "order": [[0, 'desc']],
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