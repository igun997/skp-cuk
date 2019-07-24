<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class LoginControl extends Controller
{
    public function index()
    {
      return view("app.login");
    }
    public function login(Request $req)
    {
      $req->validate([
        "username"=>"required",
        "password"=>"required"
      ]);
      $cekadmin = Admin::where(["username"=>$req->username,"password"=>$req->password]);
      if ($cekadmin->count() > 0) {
        $push["level"] = "admin";
        $push["username"] = $cekadmin->first()->username;
        session($push);
        return redirect(route("admin"));
      }else {
        $cekpegawai = Pegawai::where(["nip"=>$req->username,"password"=>$req->password]);
        if ($cekpegawai->count() > 0) {
          $push["level"] = "pegawai";
          $push["nip"] = $cekpegawai->first()->nip;
          $push["id_unit"] = $cekpegawai->first()->id_unit;
          $push["nama"] = $cekpegawai->first()->nama;
          session($push);
          return redirect(route("pegawai"));
        }else {
          return back()->withErrors(["msg"=>"Username dan Password Salah"]);
        }
      }
    }
}
