@extends('app.admin')
@section('title',$title)
@section('css')

@endsection


@section('content')
<div class="col-6">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{$title}}</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table datatable">
          <thead>
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            @foreach($jabatan as $k => $v)
            <tr>
              <td>{{$k+1}}</td>
              <td>{{$v->jabatan}}</td>
              <td>
                <a href="{{route("admin.jabatan.delete",$v->id_jabatan)}}" class="btn btn-danger">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="col-6">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Jabatan</h3>
    </div>
    <div class="card-body">
      @if(session()->has("msg"))
      <div class="alert alert-success">{{session()->get("msg")}}</div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
       @endif
      <form action="{{route("admin.jabatan.add_action")}}" method="post">
        @csrf
        <div class="form-group">
          <label>Nama Jabatan</label>
          <input type="text" class="form-control" name="jabatan" placeholder="">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection


@section('js')
<script>
require(['datatables','jquery'], function(datatable, $) {
    $('.datatable').DataTable();
  });
</script>
@endsection
