<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skp;
use App\Models\SkpDetail;
use App\Models\SkpPerilaku;
use Helpers\Skphelper;
use PDF;
class PegawaiControl extends Controller
{
  public function index()
  {
    $data["title"] = "Dashboard Pegawai";
    $skp = Skp::where(["nip_pegawai"=>session()->get("nip"),"tahun"=>date("Y")]);
    $skpHelper = new Skphelper();
    $target = [];
    $realisasi = [];
    if ($skp->count() > 0) {
      $getdetail = SkpDetail::where(["id_skp"=>$skp->first()->id_skp])->get();
    }else {
      $getdetail = [];
    }
    foreach ($getdetail as $key => $value) {
      $target[] = ["kuantitas"=>$value->kegiatan->kuantitas,"kualitas"=>$value->kegiatan->kualitas,"biaya"=>$value->kegiatan->biaya];
      $realisasi[] = ["kuantitas"=>$value->kuantitas,"kualitas"=>$value->kualitas];
    }
    if (count($target) > 0 && count($realisasi) > 0) {
      $skpHelper->setTarget($target);
      $skpHelper->setRealisasi($realisasi);
      $res = $skpHelper->run();
      if ($res != false) {
        $data["penilaian"] = $res;
      }else {
        $data["penilaian"] = ["rata_rata"=>0];
      }
    }else {
      $data["penilaian"] = ["rata_rata"=>0];
    }
    $d = [];
    if ($skp->count() > 0) {
      foreach (SkpPerilaku::where(["id_skp"=>$skp->first()->id_skp])->get() as $key => $value) {
        $d[] = $value->orientasi_pelayanan;
        $d[] = $value->integritas;
        $d[] = $value->komitmen;
        $d[] = $value->disiplin;
        $d[] = $value->kerjasama;
        $d[] = $value->kepemimpinan;
      }
    }
    // return response()->json(SkpPerilaku::where(["id_skp"=>$skp->first()->id_skp])->first());
    // return response()->json($skp->first()->id_skp);
    if (!empty($d)) {
      $data["perilaku"] = $skpHelper->perilaku($d);
    }else {
      $data["perilaku"] = ["rata_rata"=>0];
    }
    return view("pegawai.home")->with($data);
  }
  public function perilaku_skp_terima($id)
  {
    $up = Skp::findOrFail($id)->update(["status"=>"diterima"]);
    if ($up) {
      return redirect(route("pegawai.perilaku.add",$id))->with(["msg"=>"Silahkan Isi Perilaku"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Update Status SKP"]);
    }
  }
  public function skp()
  {
    $skp = Skp::where(["nip_pegawai"=>session()->get("nip"),"tahun"=>date("Y")]);
    //SKP
    $skpHelper = new Skphelper();
    $target = [];
    $realisasi = [];
    if ($skp->count() > 0) {
      $getdetail = SkpDetail::where(["id_skp"=>$skp->first()->id_skp])->get();
    }else {
      $getdetail = [];
    }
    foreach ($getdetail as $key => $value) {
      $target[] = ["kuantitas"=>$value->kegiatan->kuantitas,"kualitas"=>$value->kegiatan->kualitas,"biaya"=>$value->kegiatan->biaya];
      $realisasi[] = ["kuantitas"=>$value->kuantitas,"kualitas"=>$value->kualitas];
    }
    if (count($target) > 0 && count($realisasi) > 0) {
      $skpHelper->setTarget($target);
      $skpHelper->setRealisasi($realisasi);
      $res = $skpHelper->run();
      if ($res != false) {
        $data["penilaian"] = $res;
      }else {
        $data["penilaian"] = [];
      }
    }else {
      $data["penilaian"] = [];
    }
    $data["title"] = "Pengisian Formulir SKP";
    $data["status"] = $skp;
    // return response()->json($res);
    return view("pegawai.skp")->with($data);
  }
  public function skp_add_action(Request $req)
  {
    $tbl = ["id_skp","id_kegiatan","kuantitas","kualitas"];
    $data = [$req->id_skp,$req->id_kegiatan,$req->kuantitas,$req->kualitas];
    $data = array_map(null,...$data);
    $temp = [];
    foreach ($data as $key => $value) {
      $temp[] = ["id_skp"=>$value[0],"id_kegiatan"=>$value[1],"kuantitas"=>$value[2],"kualitas"=>$value[3]];
    }
    $data = $temp;
    // return response()->json($data);
    $ins = SkpDetail::insert($data);
    if ($ins) {
      return back()->with(["msg"=>"Sukses Input SKP"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Input SKP"]);
    }
  }
  public function perilaku()
  {
    $skp = Skp::where(["nip_pejabat"=>session()->get("nip"),"tahun"=>date("Y")])->orWhere(["nip_pegawai"=>session()->get("nip"),"tahun"=>date("Y")]);
    $data["status"] = $skp;
    $data["title"] = "Penilaian Perilaku";
    $data["skphelp"] = new Skphelper();
    return view("pegawai.perilaku")->with($data);
  }
  public function perilaku_skp($id)
  {
    $skp = Skp::where(["id_skp"=>$id]);
    //SKP
    $skpHelper = new Skphelper();
    $target = [];
    $realisasi = [];
    if ($skp->count() > 0) {
      $getdetail = SkpDetail::where(["id_skp"=>$skp->first()->id_skp])->get();
    }else {
      $getdetail = [];
    }
    foreach ($getdetail as $key => $value) {
      $target[] = ["kuantitas"=>$value->kegiatan->kuantitas,"kualitas"=>$value->kegiatan->kualitas,"biaya"=>$value->kegiatan->biaya];
      $realisasi[] = ["kuantitas"=>$value->kuantitas,"kualitas"=>$value->kualitas];
    }
    if (count($target) > 0 && count($realisasi) > 0) {
      $skpHelper->setTarget($target);
      $skpHelper->setRealisasi($realisasi);
      $res = $skpHelper->run();
      if ($res != false) {
        $data["penilaian"] = $res;
      }else {
        $data["penilaian"] = [];
      }
    }else {
      $data["penilaian"] = [];
    }
    $data["title"] = "Lihat Formulir SKP";
    $data["status"] = $skp;
    // return response()->json($res);
    return view("pegawai.skp_view")->with($data);
  }
  public function perilaku_skp_tolak(Request $req,$id)
  {
    $del = SkpDetail::where(["id_skp"=>$id])->delete();
    if ($del > 0) {
      return back()->with(["msg"=>"Berkas SKP Berhasil Ditolak"]);
    }else {
      return back()->withErrors(["msg"=>"Berkas SKP Gagal Ditolak"]);
    }
  }
  public function perilaku_add($id)
  {
    $data["title"] = "Pengisian Perilaku Pegawai";
    $data["data"] = SkpPerilaku::where(["id_skp"=>$id])->first();
    $data["id"] = $id;
    return view("pegawai.perilaku_add")->with($data);
  }
  public function perilaku_add_aksi(Request $req,$id)
  {
    $req->validate([
      "orientasi_pelayanan"=>"required",
      "integritas"=>"required",
      "komitmen"=>"required",
      "disiplin"=>"required",
      "kerjasama"=>"required",
      "kepemimpinan"=>"required",
    ]);
    $data = $req->all();
    unset($data["_token"]);
    $create = SkpPerilaku::firstOrCreate(["id_skp"=>$id],$data);
    if ($create) {
      return back()->with(["msg"=>"Sukses Input Nilai Perilaku"]);
    }else {
      return back()->withErrors(["msg"=>"Gagal Input Nilai Perilaku"]);
    }
  }
  public function perilaku_print($id)
  {
    $skp = Skp::where(["id_skp"=>$id]);
    //SKP
    $skpHelper = new Skphelper();
    $target = [];
    $realisasi = [];
    if ($skp->count() > 0) {
      $getdetail = SkpDetail::where(["id_skp"=>$skp->first()->id_skp])->get();
    }else {
      $getdetail = [];
    }
    foreach ($getdetail as $key => $value) {
      $target[] = ["kuantitas"=>$value->kegiatan->kuantitas,"kualitas"=>$value->kegiatan->kualitas,"biaya"=>$value->kegiatan->biaya];
      $realisasi[] = ["kuantitas"=>$value->kuantitas,"kualitas"=>$value->kualitas];
    }
    if (count($target) > 0 && count($realisasi) > 0) {
      $skpHelper->setTarget($target);
      $skpHelper->setRealisasi($realisasi);
      $res = $skpHelper->run();
      if ($res != false) {
        $data["penilaian"] = $res;
      }else {
        $data["penilaian"] = [];
      }
    }else {
      $data["penilaian"] = [];
    }
    $data["data"] = $skp->first();
    $data["tanggal_cetak"] = date("d-m-Y");
    $data["items"] = $getdetail;
    $per = $skp->first()->skp_perilakus()->get();
    $res = [];
    foreach ($per as $key => $value) {
      $res[] = $value->orientasi_pelayanan;
      $res[] = $value->integritas;
      $res[] = $value->komitmen;
      $res[] = $value->disiplin;
      $res[] = $value->kerjasama;
      $res[] = $value->kepemimpinan;
    }
    $ni = $skpHelper->perilaku($res);
    $data["p_rata_rata"] = $ni["rata_rata"];
    $data["p_mutu"] = $ni["mutu"];
    unset($ni["mutu"]);
    unset($ni["rata_rata"]);
    $data["perilaku"] = $ni;
    $data["perilaku_list"] = ["Orientasi Penilaian","Integritas","Komitmen","Disiplin","Kerjasama","Kepemimpinan"];
    $data["title"] = [];
    $pdf = PDF::loadView('pdf.skp', $data)->setPaper('a4', 'landscape');
    return $pdf->download('skp.pdf');
  }
}
