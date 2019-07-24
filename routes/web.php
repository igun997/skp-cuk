<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route("login"));
});
Route::get('/login',"LoginControl@index")->name("login");
Route::post('/login',"LoginControl@login")->name("login_action");
Route::get('/logout',function(){
  return redirect(route("login"))->with("msg","Logout Berhasil");
})->name("logout");

Route::group(['middleware' => ['admin']], function () {
  Route::get('/admin',"AdminControl@index")->name("admin");
  Route::get('/admin/golongan',"AdminControl@golongan")->name("admin.golongan.index");
  Route::post('/admin/golongan/add',"AdminControl@golongan_add_action")->name("admin.golongan.add_action");
  Route::get('/admin/golongan/del/{id}',"AdminControl@golongan_delete")->name("admin.golongan.delete");
  Route::get('/admin/jabatan',"AdminControl@jabatan")->name("admin.jabatan.index");
  Route::post('/admin/jabatan/add',"AdminControl@jabatan_add_action")->name("admin.jabatan.add_action");
  Route::get('/admin/jabatan/del/{id}',"AdminControl@jabatan_delete")->name("admin.jabatan.delete");
  Route::get('/admin/unit',"AdminControl@unit")->name("admin.unit.index");
  Route::post('/admin/unit/add',"AdminControl@unit_add_action")->name("admin.unit.add_action");
  Route::get('/admin/unit/del/{id}',"AdminControl@unit_delete")->name("admin.unit.delete");
  Route::get('/admin/pegawai',"AdminControl@pegawai")->name("admin.pegawai.index");
  Route::post('/admin/pegawai/add',"AdminControl@pegawai_add_action")->name("admin.pegawai.add_action");
  Route::get('admin/pegawai/up/{id}',"AdminControl@pegawai_up")->name("pegawai.up");
  Route::post('/admin/pegawai/up/{id}',"AdminControl@pegawai_update")->name("admin.pegawai.update");
  Route::get('/admin/pegawai/del/{id}',"AdminControl@pegawai_delete")->name("admin.pegawai.delete");
  Route::get('/admin/kegiatan',"AdminControl@kegiatan")->name("admin.kegiatan.index");
  Route::post('/admin/kegiatan/add',"AdminControl@kegiatan_add_action")->name("admin.kegiatan.add_action");
  Route::get('admin/kegiatan/up/{id}',"AdminControl@kegiatan_up")->name("kegiatan.up");
  Route::get('admin/kegiatan/download',"AdminControl@kegiatan_download")->name("kegiatan.download");
  Route::post('admin/kegiatan/upload',"AdminControl@kegiatan_upload")->name("kegiatan.upload");
  Route::post('/admin/kegiatan/up/{id}',"AdminControl@kegiatan_update")->name("admin.kegiatan.update");
  Route::get('/admin/kegiatan/del/{id}',"AdminControl@kegiatan_delete")->name("admin.kegiatan.delete");
  Route::get('/admin/skp',"AdminControl@skp")->name("admin.skp.index");
  Route::get('/admin/ranking',"AdminControl@ranking")->name("admin.ranking.index");
  Route::post('/admin/ranking',"AdminControl@ranking_add")->name("admin.ranking.add");
  Route::post('/admin/skp/add',"AdminControl@skp_add_action")->name("admin.skp.add_action");
  Route::get('/admin/skp/del/{id}',"AdminControl@skp_delete")->name("admin.skp.delete");
  Route::get('/admin/perilaku',function(){
    echo "Pages";
  })->name("admin.perilaku.index");
  Route::get('/admin/hasil',function(){
    echo "Pages";
  })->name("admin.hasil.index");

});

Route::group(['middleware' => ['pegawai']], function () {
  Route::get('/pegawai',"PegawaiControl@index")->name("pegawai");
  Route::get('/pegawai/skp',"PegawaiControl@skp")->name("pegawai.skp.index");
  Route::post('/pegawai/skp/add',"PegawaiControl@skp_add_action")->name("pegawai.skp.add_action");
  Route::get('/pegawai/skp/del/{id}',"PegawaiControl@skp_delete")->name("pegawai.skp.delete");
  Route::get('/pegawai/perilaku',"PegawaiControl@perilaku")->name("pegawai.perilaku.index");
  Route::get('/pegawai/perilaku/{id}',"PegawaiControl@perilaku_skp")->name("pegawai.perilaku.skp");
  Route::post('/pegawai/perilaku/{id}',"PegawaiControl@perilaku_skp_tolak")->name("pegawai.skp.tolak_action");
  Route::get('/pegawai/perilaku/{id}/terima',"PegawaiControl@perilaku_skp_terima")->name("pegawai.perilaku.skp.terima_action");
  Route::get('/pegawai/perilaku/add/{id}',"PegawaiControl@perilaku_add")->name("pegawai.perilaku.add");
  Route::get('/pegawai/perilaku/cetak/{id}',"PegawaiControl@perilaku_print")->name("pegawai.perilaku.cetak");
  Route::post('/pegawai/perilaku/add/{id}',"PegawaiControl@perilaku_add_aksi")->name("pegawai.perilaku.add_aksi");
  Route::get('/pegawai/hasil',function(){
    echo "Pages";
  })->name("pegawai.hasil.index");
});
