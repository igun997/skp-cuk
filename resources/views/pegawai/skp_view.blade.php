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
      <div class="table-responsive">
        <form action="{{route("pegawai.skp.tolak_action",$status->first()->id_skp)}}" method="post">
        <input type="text" name="tolak" value="1" hidden>
        <table class="table table-bordered">
          <tr>
            <th>Nama Uraian Kegiatan</th>
            <th>Target Kuantitas</th>
            <th>Satuan Kuantitas</th>
            <th>Target Kualitas</th>
            <th>Waktu</th>
            <th>Biaya</th>
            <th>Realisasi Kuantitas</th>
            <th>Realisasi Kualitas</th>
            <th>Perhitungan</th>
            <th>Nilai Capaian SKP</th>
          </tr>
          <input type="text" disabled value="{{$data = 0}}" hidden>
          @foreach(\App\Models\Kegiatan::where(["id_unit"=>session()->get("id_unit")])->get() as $k => $v)
          <tr>
            <td>{{$v->nama}}</td>
            <td>{{$v->kuantitas}}</td>
            <td>{{$v->satuan_kuantitas}}</td>
            <td>{{$v->kualitas}}</td>
            <td>{{$v->waktu}}</td>
            <td>{{$v->biaya}}</td>
            <td>
              @csrf
              <input type="text"  value="{{$status->first()->id_skp}}" hidden>
              <input type="text" value="{{$v->id_kegiatan}}" hidden>
              @if(\App\Models\SkpDetail::where(["id_skp"=>$status->first()->id_skp,"id_kegiatan"=>$v->id_kegiatan])->count() > 0)
              <input type="text"  value="{{\App\Models\SkpDetail::where(["id_skp"=>$status->first()->id_skp,"id_kegiatan"=>$v->id_kegiatan])->first()->kuantitas}}" disabled class="form-control">
              @else
              <input type="text"  value="" class="form-control">
              @endif
            </td>
            <td>
              @if(\App\Models\SkpDetail::where(["id_skp"=>$status->first()->id_skp,"id_kegiatan"=>$v->id_kegiatan])->count() > 0)
              <input type="text" value="{{\App\Models\SkpDetail::where(["id_skp"=>$status->first()->id_skp,"id_kegiatan"=>$v->id_kegiatan])->first()->kualitas}}" disabled class="form-control">
              @else
              <input type="text" value="" class="form-control">
              @endif
            </td>
            @if(\App\Models\SkpDetail::where(["id_skp"=>$status->first()->id_skp,"id_kegiatan"=>$v->id_kegiatan])->count() > 0)
            <td>
              {{$penilaian[$k]["perhitungan"]}}
            </td>
            <td>
              {{$penilaian[$k]["skp"]}}
            </td>
            @else
            <td>
              Belum Terhitung
            </td>
            <td>
              Belum Terhitung
            </td>
            @endif
          </tr>
          @endforeach
          <tr>
            <td colspan="6"></td>
            <td colspan="3">
              @if($status->first()->status == "menunggu")
              <button type="submit" class="btn-block btn btn-danger">
                Berkas SKP ditolak
              </button>
              <a href="{{route("pegawai.perilaku.skp.terima_action",$status->first()->id_skp)}}" class="btn btn-block btn-success">
                Terima Berkas SKP
              </a>
              @else

              @endif
            </td>
              @if(\App\Models\SkpDetail::where(["id_skp"=>$status->first()->id_skp])->count() > 0)
              <td>
                {{$penilaian["rata_rata"]}}
              </td>
              @else
              <td>
                0
              </td>
              @endif

          </tr>
        </table>
      </form>
      </div>
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
