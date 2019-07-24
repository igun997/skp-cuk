@extends('app.pegawai')
@section('title',$title)
@section('css')

@endsection


@section('content')
<style type="text/css">
  .value-resume {
    font-size: 30px;
    font-weight: bold;
    color: #fff;
    top: 25px;
    left: 20px;

  }
  .data-pegawai .list-pegawai{
    margin:0px;
    padding: 0px;
    border-bottom:1px solid #cfd2d6;
    height:70px;
    margin-top:10px
  }
  .data-pegawai .list-pegawai .nama-pegawai{
    font-size:13px;
    font-weight: 600;
  }
  .data-pegawai .list-pegawai .satker,
  .data-pegawai .list-pegawai .jabatan {
    font-size:11px;
    font-weight: 300;
  }
  .avatar{
    float:left;
    margin-right:10px
  }
  .data-pegawai .list-pegawai a{
    color:#252525
  }
  .data-pegawai .list-pegawai:last-child{
    border-bottom:none;
  }
  .card-boxx {
    padding: 20px;
    border-radius: 3px;
    margin-bottom: 30px;
    background-color: #ffffff;
  }
}

</style>
<div class="col-md-12">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Selamat Datang di Aplikasi SKP Kejaksaan Negeri Kabupaten Bandung</li>
  </ol>
</div>
<div class="col-md-4">
  <div class="card">
    <div class="card-body p-3 text-center" style="background : #307251">
      <div class="value-resume">
        <div class="h1 m-0" >{{\App\Models\Kegiatan::count()}}</div>
        <div class="text-muted mb-4" style="color: #fff !important ">Target</div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="card">
    <div class="card-body p-3 text-center" style="background : #459949">
      <div class="value-resume">
       <div class="h1 m-0" >{{round($penilaian["rata_rata"])}}%</div>
       <div class="text-muted mb-4" style="color: #fff !important">Capaian Kerja</div>
     </div>
   </div>
 </div>
</div>
<div class="col-md-4">
  <div class="card">
    <div class="card-body p-3 text-center" style="background : #99bf00">
      <div class="value-resume">
        <div class="h1 m-0" >{!!round($perilaku["rata_rata"])!!} %</div>
        <div class="text-muted mb-4" style="color: #fff !important">Perilaku Kerja</div>
      </div>
    </div>
  </div>
</div>
@if(\App\Models\Skp::where(["nip_pegawai"=>session()->get("nip")])->orWhere(["nip_pejabat"=>session()->get("nip")])->count() > 0)
<div class="col-md-4">
  <div class="card-boxx">
    <h4 class="header-title mb-3">Pejabat Penilai</h4>
    <div class="data-pegawai">
      <div class="list-pegawai">
        <div class="info-pegawai">
          <div class="nama-pegawai">Nama Pejabat : <b>{{\App\Models\Skp::where(["nip_pegawai"=>session()->get("nip")])->orWhere(["nip_pejabat"=>session()->get("nip")])->first()->pejabat->nama}}</b></div>
          <div class="jabatan">NIP : <b>{{\App\Models\Skp::where(["nip_pegawai"=>session()->get("nip")])->orWhere(["nip_pejabat"=>session()->get("nip")])->first()->pejabat->nip}}</b></div>
          <div class="satker">Divisi : <b>{{\App\Models\Skp::where(["nip_pegawai"=>session()->get("nip")])->orWhere(["nip_pejabat"=>session()->get("nip")])->first()->pejabat->unit->nama}}</b></div>
        </div>
      </a>
    </div>
  </div>
</div>
@if(\App\Models\Skp::where(["nip_pejabat"=>session()->get("nip")])->count() > 0)
<div class="card-boxx">
  <h4 class="header-title mb-3">Bawahan Pegawai</h4>
  @foreach(\App\Models\Skp::where(["nip_pejabat"=>session()->get("nip")])->get() as $k => $v)
  <div class="data-pegawai">
    <div class="list-pegawai">
      <div class="info-pegawai">
        <div class="nama-pegawai">Nama Pegawai : <b>{{$v->pegawai->nama}}</b></div>
        <div class="jabatan">NIP : <b>{{$v->pegawai->nip}}</b></div>
        <div class="satker">Divisi : <b>{{$v->pegawai->unit->nama}}</b></div>
      </div>
    </a>
  </div>
  @endforeach
</div>
</div>
@endif
</div>

<!-- <div class="col-md-4">
  <div class="card-boxx">
    <h4 class="header-title mb-3">Atasan Pejabat Penilai</h4>
    <div class="data-pegawai">
      <div class="list-pegawai">
        <div class="info-pegawai">
          <div class="nama-pegawai">Nama Atasan Penilai</div>
          <div class="jabatan">NIP</div>
          <div class="satker">Divisi</div>
        </div>
      </a>
    </div>
  </div>
</div>
</div> -->
@endif

@endsection


@section('js')

@endsection
