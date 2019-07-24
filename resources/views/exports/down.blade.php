<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <td>nama</td>
        <td>kuantitas</td>
        <td>satuan_kuantitas</td>
        <td>id_unit</td>
        <td>kualitas</td>
        <td>waktu</td>
        <td>biaya</td>
        <td>KODE SUB Bagian</td>
      </tr>
      @foreach($data as $k => $v)
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$v->id_unit}} - {{$v->nama}}</td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
