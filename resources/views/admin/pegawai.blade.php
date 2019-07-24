@extends('app.admin')
@section('title',$title)
@section('css')

@endsection


@section('content')

<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{$title}}</h3>
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
    <p align="right">
      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#Tambahpegawai"><i class="pe-7s-pin"></i> Tambah Pegawai</a>  
    </p>
  </div>

  <div id="Tambahpegawai" class="modal fade" role="dialog">
    <div class="modal-dialog modal-12-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="card-title">Tambah Pegawai</h3>
        </div>
        <div class="modal-body">

          <form action="{{route("admin.pegawai.add_action")}}" method="post">
            @csrf
            <div class="form-group">
              <label>NIP</label>
              <input type="text" class="form-control" name="nip" placeholder="" id="np">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" name="password" id="pw" placeholder="">
            </div>
            <div class="form-group">
              <label>Nama Pegawai</label>
              <input type="text" class="form-control" name="nama" placeholder="">
            </div>
            <div class="form-group">
              <label>Golongan</label>
              <select class="form-control" name="id_golongan">
                @foreach(\App\Models\Golongan::all() as $k => $v)
                <option value="{{$v->id_golongan}}">{{$v->gol}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control" name="id_jabatan">
                @foreach(\App\Models\Jabatan::all() as $k => $v)
                <option value="{{$v->id_jabatan}}">{{$v->jabatan}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Sub. Bagian</label>
              <select class="form-control" name="id_unit">
                @foreach(\App\Models\Unit::all() as $k => $v)
                <option value="{{$v->id_unit}}">{{$v->nama}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Jenis kelamin</label>
              <select class="form-control" name="jk">
                <option value="laki-laki">Laki - Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">
                Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table datatable">
        <thead>
          <th>No</th>
          <th>NIP</th>
          <th>Nama Pegawai</th>
          <th>Golongan</th>
          <th>Jabatan</th>
          <th>Sub. Bagian</th>
          <th>Jenis Kelamin</th>
          <th>Aksi</th>
        </thead>
        <tbody>
          @foreach($pegawai as $k => $v)
          <tr>
            <td>{{$k+1}}</td>
            <td>{{$v->nip}}</td>
            <td>{{$v->nama}}</td>
            <td>{{$v->golongan->gol}}</td>
            <td>{{$v->jabatan->jabatan}}</td>
            <td>{{$v->unit->nama}}</td>
            <td>{{strtoupper($v->jk)}}</td>
            <td>
              <a href="{{route("admin.pegawai.delete",$v->nip)}}" class="btn btn-danger">
                <i class="fa fa-trash"></i>
              </a>

              <a href="{{route("admin.pegawai.update",$v->nip)}}" class="btn btn-warning">
                <i class="fa fa-edit"></i>
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
@endsection


@section('js')
<script>
  require(['datatables','jquery'], function(datatable, $) {
    $('.datatable').DataTable();
    $("#np").on("change",function(){
      console.log("Key "+$(this).val());
      $("#pw").val($(this).val());
    });
  });

</script>
@endsection
