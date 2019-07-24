<?php
namespace Helpers;

/**
 * SKP Helpers
 */

class Skphelper
{
  public $target;
  public $realisasi;
  public function setTarget($data)
  {
    $this->target = $data;
  }
  public function setRealisasi($data)
  {
    $this->realisasi = $data;
  }
  public function perilaku($data)
  {
    $res = [];
    foreach ($data as $key => &$value) {
      if ($value <= 50) {
        $mutu = "Sangat Buruk";
      }elseif ($value <= 60) {
        $mutu = "Buruk";
      }elseif ($value <= 75) {
        $mutu = "Cukup";
      }elseif ($value <= 90.99) {
        $mutu = "Baik";
      }else{
        $mutu = "Sangat Baik";
      }
      $res[] = ["nilai"=>$value,"mutu"=>$mutu];
    }
    $res["rata_rata"] = (array_sum($data)/count($data));
    if ($res["rata_rata"] <= 50) {
      $mutu = "Sangat Buruk";
    }elseif ($res["rata_rata"] <= 60) {
      $mutu = "Buruk";
    }elseif ($res["rata_rata"] <= 75) {
      $mutu = "Cukup";
    }elseif ($res["rata_rata"] <= 90.99) {
      $mutu = "Baik";
    }else{
      $mutu = "Sangat Baik";
    }
    $res["mutu"] = $mutu;
    return $res;
  }
  public function run()
  {
    if (count($this->target) != count($this->realisasi)) {
      return false;
    }
    $res = [];
    $average = [];
    foreach ($this->target as $key => $value) {
      // echo $value["kuantitas"]."<br>";
      // echo $this->realisasi[$key]["kuantitas"]."<br>";
      // echo $this->realisasi[$key]["kualitas"]."<br>";
      // exit();
      $perhitungan = ($this->realisasi[$key]["kuantitas"])/$value["kuantitas"]*100+76+$this->realisasi[$key]["kualitas"];
      // $perhitungan = ((12/10)*100)+76+20;
      $skp = ($value["biaya"] == null)?$perhitungan/3:$perhitungan/4;
      $average[] = $skp;
      $rs[] = ["perhitungan"=>$perhitungan,"skp"=>$skp];
    }
    $rs["rata_rata"] = (array_sum($average)/count($average));
    return $rs;
  }
  public function saw($w,$sample)
  {
    $r = [];
    $sample_reverse = array_map(null,...$sample);
    foreach($sample_reverse as $k => $v){
    	$division = max($v);
    	$dtemp = [];
    	foreach($v as $kres => $vres){
    		$dtemp[] = ($vres/$division);
    	}
    	$r[] = $dtemp;
    }
    $rreverse = array_map(null,...$r);

    $a = [];
    foreach($rreverse as $key => $value){
    	$sum = 0;
    	foreach($value as $k => $v){
    		$sum = $sum + ($v*$w[$k]);
    	}
    	$a[] = $sum;
    }
    return $a;
  }
}
