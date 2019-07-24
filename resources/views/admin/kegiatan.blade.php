@extends('app.admin')
@section('title',$title)
@section('css')

@endsection


@section('content')

<style type="text/css">

.tab-realisasi{
  background:#e3eaef;
}

ul.nav.tab-realisasi.nav-justified {}
.tab-realisasi li a{
  text-align: left;
  color: #404040;
  height:100px;
}


.tab-realisasi .nilai-realisasi{
  font-size: 30px;
  font-weight:900;
  margin-bottom:50px;
  margin-top:10px;
  color: #404040;
}
.tab-realisasi .nav-link.active {
  background: #459949;
  color:#fff
}
.icon-tab{
  margin-top:-10px;
  margin-left:-10px;
  height:80px;
  width:85px;
  font-size:70px;
  float: left;
  color:#acbdca;
  font-weight: lighter;
}

.mdi:before,
.mdi-set {
  display: inline-block;
  font: normal normal normal 24px/1 "Material Design Icons";
  font-size: inherit;
  text-rendering: auto;
  line-height: inherit;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  }

  .mdi-clipboard:before {
  content: "\F147"; }

.tab-realisasi .nav-link.active .nilai-realisasi,.tab-realisasi .nav-link.active .icon-tab{
  color:#fff
}
</style>

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
          <ul class="nav tab-realisasi nav-justified">

              @foreach(\App\Models\Unit::all() as $k => $v)
              <li class="nav-item">
                <a onclick="location.href='{{route("admin.kegiatan.index")}}?id={{$v->id_unit}}'" data-toggle="tab" class="nav-link active show">
                  <i class="mdi mdi-clipboard-check icon-tab"></i>
                  <div class="nilai-realisasi">{{App\Models\Kegiatan::where(["id_unit"=>$v->id_unit])->count()}}</div>
                  <div>{{$v->nama}}</div>
                </a>
              </li>
              @endforeach
            </ul>
     </div>

    <div class="card-body">

      <div class="float-right">

        <form  action="{{route("kegiatan.upload")}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <input type="file" name="berkas" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Pilih File Import</label>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <a href="{{route("kegiatan.download")}}" class="btn btn-danger btn-sm">
                  <i class="fa fa-download"></i>
                </a>
                <button type="submit" class="btn btn-info btn-sm"><i class="pe-7s-pin"></i> Import Data Kegiatan</button>
                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Tambahkegiatan"><i class="pe-7s-pin"></i> Tambah Kegiatan</a>
              </div>
            </div>
          </div>

        </form>
      </div>
      <div id="Tambahkegiatan" class="modal fade" role="dialog">
        <div class="modal-dialog modal-12-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Tambah Kegiatan</h3>
            </div>
            <div class="modal-body">

              <form id="Tambahkegiatan" action="{{route("admin.kegiatan.add_action")}}" method="post">
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
                    @foreach($divisi as $k => $v)
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

                <a href="{{route("admin.kegiatan.update",$v->id_kegiatan)}}" class="btn btn-warning">
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
  });
</script>
@endsection
