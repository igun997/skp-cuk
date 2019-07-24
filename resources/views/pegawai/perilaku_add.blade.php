@extends('app.pegawai')
@section('title',$title)
@section('css')

@endsection


@section('content')
<div class="col-6 offset-3">
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
       <form action="{{route("pegawai.perilaku.add_aksi",$id)}}" method="post">
         @csrf
         <div class="form-group">
           <label>Orientasi Pelayanan</label>
           <input type="number" class="form-control" name="orientasi_pelayanan" value="{{@$data->orientasi_pelayanan}}">
         </div>
         <div class="form-group">
           <label>Integritas</label>
           <input type="number" class="form-control" name="integritas" value="{{@$data->integritas}}">
         </div>
         <div class="form-group">
           <label>Komitmen</label>
           <input type="number" class="form-control" name="komitmen" value="{{@$data->komitmen}}">
         </div>
         <div class="form-group">
           <label>Disiplin</label>
           <input type="number" class="form-control" name="disiplin" value="{{@$data->disiplin}}">
         </div>
         <div class="form-group">
           <label>Kerja Sama</label>
           <input type="number" class="form-control" name="kerjasama" value="{{@$data->kerjasama}}">
         </div>
         <div class="form-group">
           <label>Kepemimpinan</label>
           <input type="number" class="form-control" name="kepemimpinan" value="{{@$data->kepemimpinan}}">
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
