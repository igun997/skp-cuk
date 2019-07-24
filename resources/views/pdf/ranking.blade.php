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
  <p style="text-weight:bold;text-align:left;margin-bottom:-60px"><b>{{date("d-m-Y")}}</b></p>
  <p style="text-weight:bold;text-align:right"><b>Kejaksaan Negeri Kabupaten Bandung</b></p>
  <hr>
  <hr>
  <h2 style="text-align:center">LAPORAN PERANKINGAN PEGAWAI</h2>
  <hr>
<table>
</table>
  <br>
  <center>
  <table>
    <tr>
      <th>No</th>
      <th>NIP</th>
      <th>Nama Pegawai</th>
      <th>Nilai</th>
    </tr>
    @foreach($data as $k => $v)
    <tr>
      <td>{{($k+1)}}</td>
      <td>{{$v["nip"]}}</td>
      <td>{{$v["nama"]}}</td>
      <td>{{$v["nilai"]}}</td>
    </tr>
    @endforeach
  </table>


  </div>
</center>
</body>

</html>
