@extends('app.pegawai')
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
      @if($status->count() > 0)
      @if($status->first()->nip_pegawai == session()->get("nip"))
      <div class="alert alert-info">
        Berikut Penilaian Perilaku Anda
      </div>
      <input type="text" value="{!!json_encode($data = [])!!}" hidden>
      @foreach($status->first()->skp_perilakus()->get() as $kk => $vk)
      <div class="form-group">
        <label>Orientasi Pelayanan</label>
        <input type="number" class="form-control" name="orientasi_pelayanan" disabled value="{{@$vk->orientasi_pelayanan}}" required>
        <input type="text" value="{!!json_encode($data[] = $vk->orientasi_pelayanan)!!}" hidden>
      </div>
      <div class="form-group">
        <label>Integritas</label>
        <input type="number" class="form-control" name="integritas" disabled value="{{@$vk->integritas}}" required>
        <input type="text" value="{!!json_encode($data[] = $vk->integritas)!!}" hidden>
      </div>
      <div class="form-group">
        <label>Komitmen</label>
        <input type="number" class="form-control" name="komitmen" disabled value="{{@$vk->komitmen}}" required>
        <input type="text" value="{!!json_encode($data[] = $vk->komitmen)!!}" hidden>
      </div>
      <div class="form-group">
        <label>Disiplin</label>
        <input type="number" class="form-control" name="disiplin" disabled value="{{@$vk->disiplin}}" required>
        <input type="text" value="{!!json_encode($data[] = $vk->disiplin)!!}" hidden>
      </div>
      <div class="form-group">
        <label>Kerja Sama</label>
        <input type="number" class="form-control" name="kerjasama" disabled value="{{@$vk->kerjasama}}" required>
        <input type="text" value="{!! json_encode($data[] = $vk->kerjasama) !!}" hidden>
      </div>
      <div class="form-group">
        <label>Kepemimpinan</label>
        <input type="text" value="{!! json_encode($data[] = $vk->kepemimpinan) !!}" hidden>
        <input type="number" class="form-control" name="kepemimpinan" disabled value="{{@$vk->kepemimpinan}}" required>
      </div>
      @endforeach
      @if(count($data) > 0)
      <div class="form-group">
        <label>Rata - Rata</label>
        <input type="text" class="form-control" name="kepemimpinan" disabled value="{!!(($skphelp)->perilaku($data))["rata_rata"]!!} - ({{(($skphelp)->perilaku($data))["mutu"]}})">
      </div>
      @else
      <div class="alert alert-info">
          Data Perilaku Belum Di Isi Oleh Penilai
      </div>
      @endif
      @else
      <div class="table-responsive">
        <form action="{{route("pegawai.skp.add_action")}}" method="post">
          <table class="table table-bordered datatable">
            <thead>
              <th>No</th>
              <th>NIP</th>
              <th>Bawahan Pegawai</th>
              <th>Status Pengisian Formulir SKP</th>
              <th>Status Penilaian</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach(\App\Models\Skp::where(["nip_pejabat"=>session()->get("nip")])->get() as $k => $v)
              <tr>
                <td>{{$k+1}}</td>
                <td>{{$v->nip_pegawai}}</td>
                <td>{{$v->pegawai->nama}}</td>
                <td align="center">{!!(count($v->skp_details()->get()) > 0)?"<span class='badge badge-success'>Sudah</span>":"<span class='badge badge-danger'>Belum</span>"!!}</td>
                <td align="center">{!!(count($v->skp_perilakus()->get()) > 0)?"<span class='badge badge-success'>Sudah</span>":"<span class='badge badge-danger'>Belum</span>"!!}</td>
                <td>
                  @if(count($v->skp_details()->get()) > 0)
                  <a href="{{route("pegawai.perilaku.skp",$v->id_skp)}}" class="btn btn-primary">
                    Detail form SKP
                  </a>
                  <a href="{{route("pegawai.perilaku.add",$v->id_skp)}}" class="btn btn-success">
                    Form Penilaian Perilaku
                  </a>
                  @if(count($v->skp_details()->get()) > 0 && count($v->skp_perilakus()->get()) > 0)
                  <a href="{{route("pegawai.perilaku.cetak",$v->id_skp)}}" class="btn btn-danger">
                    <i class="fa fa-print"></i>
                  </a>
                  @endif
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </form>
      </div>
      @endif
      @else
      <div class="alert alert-info">
        Tidak Ada Formulir Untuk Di Isi
      </div>
      @endif
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
