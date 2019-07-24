<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Unit;
use App\Models\Pegawai;
use App\Models\Kegiatan;
use App\Models\Skp;
use App\Models\SkpDetail;
use App\Models\SkpPerilaku;
use Helpers\Skphelper;
use App\Imports\KegiatanImport;
use App\Exports\DownExport;
use PDF;
use Excel;
class AdminControl extends Controller
{
  public function index()
  {
    $data["title"] = "Dashboard Administrator";
    return view("admin.home")->with($data);
  }
  public function golongan()
  {
    $data["title"] = "Data Golongan";
    $data["golongan"] = Golongan::all();
    return view("admin.golongan")->with($data);
  }
  public function golongan_add_action(Request $req)
  {
    $req->validate([
      "gol"=>"required"
    ]);
    $create = Golongan::create($req->all());
    if ($create) {
      return back()->with(["msg"=>"Sukses Simpan Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Simpan Data"]);
    }
  }
  public function golongan_delete($id)
  {
    $del = Golongan::find($id)->delete();
    if ($del) {
      return back()->with(["msg"=>"Sukses Hapus Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Hapus Data"]);
    }
  }
  public function jabatan()
  {
    $data["title"] = "Data Jabatan";
    $data["jabatan"] = Jabatan::all();
    return view("admin.jabatan")->with($data);
  }
  public function jabatan_add_action(Request $req)
  {
    $req->validate([
      "jabatan"=>"required"
    ]);
    $create = Jabatan::create($req->all());
    if ($create) {
      return back()->with(["msg"=>"Sukses Simpan Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Simpan Data"]);
    }
  }
  public function jabatan_delete($id)
  {
    $del = Jabatan::find($id)->delete();
    if ($del) {
      return back()->with(["msg"=>"Sukses Hapus Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Hapus Data"]);
    }
  }
  public function unit()
  {
    $data["title"] = "Data Sub. Bagian";
    $data["unit"] = Unit::all();
    return view("admin.unit")->with($data);
  }
  public function unit_add_action(Request $req)
  {
    $req->validate([
      "nama"=>"required"
    ]);
    $create = Unit::create($req->all());
    if ($create) {
      return back()->with(["msg"=>"Sukses Simpan Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Simpan Data"]);
    }
  }
  public function unit_delete($id)
  {
    $del = Unit::find($id)->delete();
    if ($del) {
      return back()->with(["msg"=>"Sukses Hapus Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Hapus Data"]);
    }
  }
  public function kegiatan(Request $req)
  {
    $input = $req->input("id");
    $data["title"] = "Data Kegiatan";
    if ($input == null) {
      $data["kegiatan"] = Kegiatan::all();
      $data["divisi"] = \App\Models\Unit::all();
    }else {
      $data["divisi"] = \App\Models\Unit::where(["id_unit"=>$input])->get();
      $data["kegiatan"] = Kegiatan::where(["id_unit"=>$input])->get();
    }
    return view("admin.kegiatan")->with($data);
  }
  public function kegiatan_download()
  {
     $ulalal = new DownExport(["data"=>Unit::all()]);
     return Excel::download($ulalal, 'format_data.xls');
  }
  public function kegiatan_upload(Request $req)
  {
    $req->validate([
      "berkas"=>"required"
    ]);
    $ins = Excel::import(new KegiatanImport, $req->file('berkas'));
    if ($ins) {
      return back()->with(["msg"=>"Upload Data Sukses"]);
    }else {
      return back()->withErrors(["msg"=>"Upload Data Gagal"]);
    }
  }
  public function kegiatan_add_action(Request $req)
  {
    $req->validate([
      "nama"=>"required",
      "kuantitas"=>"required|numeric",
      "satuan_kuantitas"=>"required",
      "kualitas"=>"required|numeric",
      "waktu"=>"required|numeric",
    ]);
    $create = Kegiatan::create($req->all());
    if ($create) {
      return back()->with(["msg"=>"Data kegiatan berhasil disimpan"]);
    }else {
      return back()->withErrors(["msg"=>"Data kegiatan gagal disimpan"]);
    }
  }

  public function kegiatan_up(Request $req,$id)
  {
    Pegawai::findOrFail($id);
    $getdata = Pegawai::where(["id_kegiatan"=>$id]);
    $data["data"] = $getdata->first();
    $data["title"] = "Update Data Kegiatan";
    return view("admin.form_kegiatan")->with($data);
  }

  public function kegiatan_update(Request $req,$id)
  {
    $find = Pegawai::findOrFail($id);
    $data = $req->all();
    $fix = $find->update($data);
    if ($fix) {
      return redirect(route("admin.kegiatan.index"))->with(["msg"=>"Sukses Input Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Input Data"]);
    }
  }


  public function kegiatan_delete($id)
  {
    $del = Kegiatan::where(["id_kegiatan"=>$id])->delete();
    if ($del) {
      return back()->with(["msg"=>"Data kegiatan berhasil dihapus"]);
    }else {
      return back()->withErrors(["msg"=>"Data kegiatan gagal dihapus"]);
    }
  }
  public function pegawai()
  {
    $data["title"] = "Data Pegawai";
    $data["pegawai"] = Pegawai::all();
    return view("admin.pegawai")->with($data);
  }
  public function pegawai_add_action(Request $req)
  {
    $req->validate([
      "nip"=>"required|unique:pegawai,nip",
      "password"=>"required|numeric",
      "nama"=>"required",
      "id_golongan"=>"required|numeric",
      "id_jabatan"=>"required|numeric",
      "id_unit"=>"required|numeric",
      "jk"=>"required",
    ]);
    $create = Pegawai::create($req->all());
    if ($create) {
      return back()->with(["msg"=>"Sukses Simpan Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Simpan Data"]);
    }
  }
  public function pegawai_up(Request $req,$id)
  {
    Pegawai::findOrFail($id);
    $getdata = Pegawai::where(["nip"=>$id]);
    $data["data"] = $getdata->first();
    $data["title"] = "Update Data Pegawai";
    return view("admin.form_pegawai")->with($data);
  }

  public function pegawai_update(Request $req,$id)
  {
    $find = Pegawai::findOrFail($id);
    $data = $req->all();
    unset($data["_token"]);
    if ($data["password"] == "") {
      unset($data["password"]);
    }
    $fix = $find->update($data);
    if ($fix) {
      return redirect(route("admin.pegawai.index"))->with(["msg"=>"Sukses Input Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Input Data"]);
    }
  }

  public function pegawai_delete($id)
  {
    $del = Pegawai::find($id)->delete();
    if ($del) {
      return back()->with(["msg"=>"Sukses Hapus Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Hapus Data"]);
    }
  }
  public function skp()
  {
    $data["title"] = "Data Skp";
    $data["skp"] = Skp::all();
    return view("admin.skp")->with($data);
  }
  public function skp_add_action(Request $req)
  {
    $req->validate([
      "nip_pejabat"=>"required",
      "nip_pegawai"=>"required",
      "tahun"=>"required",
    ]);
    if (Skp::where(["nip_pegawai"=>$req->nip_pegawai,"nip_pejabat"=>$req->nip_pejabat,"tahun"=>$req->tahun])->count() > 0) {
      return back()->withErrors(["msg"=>"Data Penilaian Sudah Ada Sebelumnya"]);
    }
    $create = Skp::create($req->all());
    if ($create) {
      return back()->with(["msg"=>"Sukses Simpan Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Simpan Data"]);
    }
  }
  public function skp_delete($id)
  {
    $del = Skp::find($id)->delete();
    if ($del) {
      return back()->with(["msg"=>"Sukses Hapus Data"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Hapus Data"]);
    }
  }
  public function ranking()
  {
    $data["title"] = "Perangkingan Pegawai";
    return view("admin.ranking")->with($data);
  }
  public function ranking_add(Request $req)
  {
    if (Pegawai::where(["id_unit"=>$req->id_unit])->count() < 1) {
      return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
    }
    $nip = [];
    foreach (Pegawai::where(["id_unit"=>$req->id_unit])->get() as $key => $value) {
      $nip[] = $value->nip;
    }
    if (Skp::whereIn("nip_pegawai",$nip)->count() < 1) {
      return back()->withErrors(["msg"=>"Data SKP Tidak Ditemukan"]);
    }
    $find = Skp::whereIn("nip_pegawai",$nip)->get();
    $skp = [];
    foreach ($find as $key => $value) {
      $skp[] = $value->id_skp;
    }
    if (SkpPerilaku::whereIn("id_skp",$skp)->count() < 1) {
      return back()->withErrors(["msg"=>"Data Perilaku Tidak Ditemukan"]);
    }
    $nilai = SkpPerilaku::whereIn("id_skp",$skp)->get();
    $w = [30,25,20,15,10,5];
    $sample = [];
    foreach ($nilai as $key => $value) {
      $sample[] = [$value->orientasi_pelayanan,$value->integritas,$value->komitmen,$value->disiplin,$value->kerjasama,$value->kepemimpinan];
    }
    $tai = new Skphelper();
    $res = $tai->saw($w,$sample);
    $data = [];
    foreach ($find as $key => $value) {
      if (!isset($res[$key])) {
        return back()->withErrors(["msg"=>"Data Penilaian Tidak Ditemukan"]);
      }
      $data[] = ["nip"=>$value->pegawai->nip,"nama"=>$value->pegawai->nama,"nilai"=>$res[$key]];
    }
    usort($data,function($a,$b){
      return $a["nilai"] < $b["nilai"];
    });
    // return response()->json($data);
    $pdf = PDF::loadView('pdf.ranking', ["data"=>$data])->setPaper('a4', 'landscape');
    return $pdf->download('ranking.pdf');

  }
}
