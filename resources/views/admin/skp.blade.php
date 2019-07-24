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
      <p align="right">
        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#Tambahkegiatan"><i class="pe-7s-pin"></i> Cari Pegawai & Pejabat Penilai</a>
      </p>

      <div id="Tambahkegiatan" class="modal fade" role="dialog">
        <div class="modal-dialog modal-12-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="card-title">Tambah Pegawai & Pejabat Penilai</h3>
            </div>
            <div class="modal-body">

              <form action="{{route("admin.skp.add_action")}}" method="post">
                @csrf
                <div class="form-group">
                  <label>Tahun SKP</label>
                  <input type="text" class="form-control" name="tahun" value="{{date("Y")}}" readonly>
                </div>
                <div class="form-group">
                  <label>Pejabat Penilai</label>
                  <select class="form-control" name="nip_pejabat">
                    @foreach(\App\Models\Pegawai::all() as $k => $v)
                    <option value="{{$v->nip}}">{{$v->nama}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Pegawai</label>
                  <select class="form-control" name="nip_pegawai">
                    @foreach(\App\Models\Pegawai::all() as $k => $v)
                    <option value="{{$v->nip}}">{{$v->nama}}</option>
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
        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <th>No</th>
              <th>Tahun Penilaian</th>
              <th>Pejabat Penilai</th>
              <th>Pegawai</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($skp as $k => $v)
              <tr>
                <td>{{$k+1}}</td>
                <td>{{$v->tahun}}</td>
                <td>[{{$v->pejabat->nip}}] {{$v->pejabat->nama}}</td>
                <td>[{{$v->pegawai->nip}}] {{$v->pegawai->nama}}</td>
                <td>
                  <a href="{{route("admin.skp.delete",$v->id_skp)}}" class="btn btn-danger">
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
