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
      <div class="col-12">
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
      <div id="Tambahkegiatan" class="modal fade" role="dialog">
        <div class="modal-dialog modal-12-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Tambah Kegiatan</h3>
            </div>
            <div class="modal-body">

              <form action="{{route("admin.kegiatan.update",$data->id_kegiatan)}}" method="post">
                @csrf
                <div class="form-group">
                  <label>Nama Kegiatan</label>
                  <input type="text" class="form-control" name="nama" placeholder="">
                </div>
                <div class="form-group">
                  <label>Kuantitas</label>
                  <input type="number" class="form-control" name="kuantitas" placeholder="">
                </div>
                <div class="form-group">
                  <label>Satuan Kuantitas</label>
                  <input type="text" class="form-control" name="satuan_kuantitas" placeholder="">
                </div>
                <div class="form-group">
                  <label>Kualitas</label>
                  <input type="number" class="form-control" name="kualitas" placeholder="">
                </div>
                <div class="form-group">
                  <label>Waktu</label>
                  <input type="number" class="form-control" name="waktu" placeholder="">
                </div>
                <div class="form-group">
                  <label>Biaya</label>
                  <input type="number" class="form-control" name="biaya" placeholder="">
                </div>
                <div class="form-group">
                  <label>Sub. Bagian</label>
                  <select class="form-control" name="id_unit">
                    @foreach(\App\Models\Unit::all() as $k => $v)
                    <option value="{{$v->id_unit}}">{{$v->nama}}</option>
                    @endforeach
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
      <div class="table-responsive">
        <table class="table datatable">
          <thead>
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Kuantitas</th>
            <th>Satuan Kuantitas</th>
            <th>Kualitas</th>
            <th>Waktu</th>
            <th>Biaya</th>
            <th>Sub. Bagian</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            @foreach($kegiatan as $k => $v)
            <tr>
              <td>{{$k+1}}</td>
              <td>{{$v->nama}}</td>
              <td>{{$v->kuantitas}}</td>
              <td>{{$v->satuan_kuantitas}}</td>
              <td>{{$v->kualitas}}</td>
              <td>{{$v->waktu}}</td>
              <td>{{$v->biaya}}</td>
              <td>{{@$v->unit->nama}}</td>
              <td>
                <a href="{{route("admin.kegiatan.delete",$v->id_kegiatan)}}" class="btn btn-danger">
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

@endsection


@section('js')
<script>
  require(['datatables','jquery'], function(datatable, $) {
    $('.datatable').DataTable();
  });
</script>
@endsection
