@extends('app.admin')
@section('title',$title)
@section('css')

@endsection


@section('content')
<div class="col-md-12">  
  <ol class="breadcrumb">
  <li class="breadcrumb-item active">Selamat Datang di Aplikasi SKP Kejaksaan Negeri Kabupaten Bandung</li>
</ol>
</div>
<div class="col-6 col-sm-4 col-lg-2">
  <div class="card">
    <div class="card-body p-3 text-center">
      <div class="h1 m-0">{{\App\Models\Golongan::count()}}</div>
      <div class="text-muted mb-4">Golongan</div>
    </div>
  </div>
</div>
<div class="col-6 col-sm-4 col-lg-2">
  <div class="card">
    <div class="card-body p-3 text-center">
      <div class="h1 m-0">{{\App\Models\Jabatan::count()}}</div>
      <div class="text-muted mb-4">Jabatan</div>
    </div>
  </div>
</div>
<div class="col-6 col-sm-4 col-lg-2">
  <div class="card">
    <div class="card-body p-3 text-center">
      <div class="h1 m-0">{{\App\Models\Unit::count()}}</div>
      <div class="text-muted mb-4">Unit</div>
    </div>
  </div>
</div>
<div class="col-6 col-sm-4 col-lg-2">
  <div class="card">
    <div class="card-body p-3 text-center">
      <div class="h1 m-0">{{\App\Models\Kegiatan::count()}}</div>
      <div class="text-muted mb-4">Uraian Kegiatan</div>
    </div>
  </div>
</div>
<div class="col-6 col-sm-4 col-lg-2">
  <div class="card">
    <div class="card-body p-3 text-center">
      <div class="h1 m-0">{{\App\Models\Pegawai::count()}}</div>
      <div class="text-muted mb-4">Pegawai</div>
    </div>
  </div>
</div>
<div class="col-6 col-sm-4 col-lg-2">
  <div class="card">
    <div class="card-body p-3 text-center">
      <div class="h1 m-0">{{\App\Models\Skp::count()}}</div>
      <div class="text-muted mb-4">SKP</div>
    </div>
  </div>
</div>
@endsection


@section('js')

@endsection
