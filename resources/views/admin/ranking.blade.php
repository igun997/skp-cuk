@extends('app.admin')
@section('title',$title)
@section('css')

@endsection


@section('content')
<div class="col-6 offset-3">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Perangkingan Pegawai</h3>
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
      <form action="{{route("admin.ranking.add")}}" method="post">
        @csrf
        <div class="form-group">
          <label>Sub Bagian</label>
          <select class="form-control" name="id_unit">
            @foreach(\App\Models\Unit::all() as $k => $v)
            <option value="{{$v->id_unit}}">{{$v->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">
            Cetak
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
