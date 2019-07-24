<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <style>
    table,
    td,
    th {
      border: 1px solid black;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th {
      height: 50px;
      text-align: center ;
    }
    .break {
      page-break-before: always;
    }
  </style>
</head>

<body>
  <p style="text-weight:bold;text-align:left;margin-bottom:-60px"><b>{{$tanggal_cetak}}</b></p>
  <p style="text-weight:bold;text-align:right"><b>Kejaksaan Negeri Kabupaten Bandung</b></p>
  <hr>
  <hr>
  <h2 style="text-align:center">LAPORAN SKP</h2>
  <hr>
<table>
  <tr>
    <th>Nama Pegawai</th>
    <td>{{$data->pegawai->nama}}</td>
  </tr>
  <tr>
    <th>Pejabat Penilai</th>
    <td>{{$data->pejabat->nama}}</td>
  </tr>
</table>
  <br>
  <center>
  <table>
    <tr>
      <th rowspan="2">No</th>
      <th rowspan="2">KEGIATAN TUGAS TAMBAH</th>
      <th colspan="4">TARGET</th>
      <th colspan="4">Realisasi</th>
      <th rowspan="2">Perhitungan</th>
      <th rowspan="2">NIlai Capaian SKP</th>
    </tr>
    <tr>
      <th>Kuant / Output</th>
      <th>Kual / Mutu</th>
      <th>Waktu</th>
      <th>Biaya</th>
      <th>Kuant / Output</th>
      <th>Kual / Mutu</th>
      <th>Waktu</th>
      <th>Biaya</th>
    </tr>
    @foreach($items as $k => $v)
    <tr>
      <td>{{($k+1)}}</td>
      <td>{{$v->kegiatan->nama}}</td>
      <td>{{$v->kegiatan->kuantitas}}</td>
      <td>{{$v->kegiatan->kualitas}}</td>
      <td>{{$v->kegiatan->waktu}}</td>
      <td>{{$v->kegiatan->biaya}}</td>
      <td>{{$v->kuantitas}}</td>
      <td>{{$v->kualitas}}</td>
      <td>{{$v->kegiatan->waktu}}</td>
      <td>{{$v->kegiatan->biaya}}</td>
      <td>{{number_format($penilaian[$k]["perhitungan"],2)}}</td>
      <td>{{number_format($penilaian[$k]["skp"],2)}}</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="11">Rata - Rata</td>
      <td>{{$penilaian["rata_rata"]}}</td>
    </tr>
  </table>
  <div class="break">
    <table>
      <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Januari s/d Desember {{$data->tahun}}</td>
        <td>
          <p>Penilaian SKP sampai dengan akhir Desember {{$data->tahun}} = </p>
          <p>{{number_format($penilaian["rata_rata"],2)}} sedangkan penilaian perilaku kerjanya adalah sebagai berikut:</p>
          @foreach($perilaku as $k => $v)
          <p>{{$perilaku_list[$k]}} = {{$v["nilai"]}} ({{$v["mutu"]}})</p>
          @endforeach
          <p>Nilai Rata - Rata = {{$p_rata_rata}} ({{$p_mutu}})</p>
        </td>
        <td>
          <p align="center">Kepala Kantor</p>
          <p></p>
          <p></p>
          <p></p>
          <p align="center">WAWAN HERDIAN</p>
          <p align="center">XXXXXXXXXXXX</p>
        </td>
      </tr>
    </table>
  </div>
  <div class="break">
    
  </div>
</center>
</body>

</html>
