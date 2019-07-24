@extends('app.admin')
@section('title',$title)
@section('css')

@endsection


@section('content')
<div class="col-6 offset-3">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Pegawai</h3>
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
      <form action="{{route("admin.pegawai.update",$data->nip)}}" method="post">
        @csrf
        <div class="form-group">
          <label>NIP</label>
          <input type="text" class="form-control" name="nip" value="{{$data->nip}}" placeholder="" disabled>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" name="password" placeholder="Masukan Password Baru">
        </div>
        <div class="form-group">
          <label>Nama Pegawai</label>
          <input type="text" class="form-control" name="nama" value="{{$data->nama_pegawai}}" placeholder="">
        </div>
        <div class="form-group">
          <label>Golongan</label>
          <select class="form-control" name="id_golongan">
            @foreach(\App\Models\Golongan::all() as $k => $v)
            @if($data->id_gol == $v->id_gol)
            <option value="{{$v->id_golongan}}">{{$v->gol}}</option>
            @endif
            <option value="{{$v->id_golongan}}">{{$v->gol}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Jabatan</label>
          <select class="form-control" name="id_jabatan">
            @foreach(\App\Models\Jabatan::all() as $k => $v)
            @if($data->id_jabatan == $v->id_jabatan)
            <option value="{{$v->id_jabatan}}">{{$v->jabatan}}</option>
            @endif
            <option value="{{$v->id_jabatan}}">{{$v->jabatan}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Unit</label>
          <select class="form-control" name="id_unit">
            @foreach(\App\Models\Unit::all() as $k => $v)
            @if($data->id_unit == $v->id_unit)
            <option value="{{$v->id_unit}}">{{$v->nama}}</option>
            @endif
            <option value="{{$v->id_unit}}">{{$v->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Jenis kelamin</label>
          <select class="form-control" name="jk">
            <option value="{{$data->jk}}" selected>{{strtoupper($data->jk)}}</option>
            <option value="laki-laki">Laki - Laki</option>
            <option value="perempuan">Perempuan</option>
          </select>
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
