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
				<form action="{{route("admin.pegawai.update",$data->nip)}}" method="post">
					@csrf
					<div class="form-group">
						<label>NIP</label>
						<input type="text" class="form-control" name="nip" value="{{$data->nip}}" placeholder="" id="np">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="text" class="form-control" name="password" value="{{$data->password}}" placeholder="Ubah untuk ganti password" id="pw" readonly>
					</div>
					<div class="form-group">
						<label>Nama Pegawai</label>
						<input type="text" class="form-control" name="nama" value="{{$data->nama}}" placeholder="">
					</div>
					<div class="form-group">
						<label>Golongan</label>
						<select class="form-control" name="id_golongan" value="{{$data->golongan}}">
							@foreach(\App\Models\Golongan::all() as $k => $v)
							@if($data->id_golongan == $v->id_golongan)
							<option value="{{$v->id_golongan}}">{{$v->gol}}</option>
							@endif
							<option value="{{$v->id_golongan}}">{{$v->gol}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Jabatan</label>
						<select class="form-control" name="id_jabatan" value="{{$data->jabatan}}">
							@foreach(\App\Models\Jabatan::all() as $k => $v)
							@if($data->id_jabatan == $v->id_jabatan)
							<option value="{{$v->id_jabatan}}">{{$v->jabatan}}</option>
							@endif
							<option value="{{$v->id_jabatan}}">{{$v->jabatan}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Sub. Bagian</label>
						<select class="form-control" name="id_unit" value="{{$data->golongan}}">
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
						<select class="form-control" name="jk" value="{{$data->jk}}">
							<option value="laki-laki">Laki - Laki</option>
							<option value="perempuan">Perempuan</option>
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
@endsection


@section('js')
<script>
	require(['datatables','jquery'], function(datatable, $) {
		$('.datatable').DataTable();
		$("#np").on("change",function(){
			console.log("Key "+$(this).val());
			$("#pw").val($(this).val());
		});
	});
</script>
@endsection
