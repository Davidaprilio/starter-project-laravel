<?php

namespace Davidaprilio\LaravelStarter\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Davidaprilio\LaravelStarter\Models\Kecamatan;
use Davidaprilio\LaravelStarter\Models\Kota;
use Davidaprilio\LaravelStarter\Models\Provinsi;
use Illuminate\Http\Request;

class DaerahIndonesia extends Controller
{
    /**
     * Api Semua Provinsi
     * 
     * @return Json
     */
    public function provinsi()
    {
        return Provinsi::orderBy('name')->get();
    }


    /**
     * Api Kota dari Provinsi yang di-pilih
     * 
     * @param prov_id = id provinsi
     * @return Json
     */
    public function kota(Request $request)
    {
        if ($request->prov_id) {
            return Kota::where('provinsi_id', $request->prov_id)->orderBy('name')->get();
        }
        return ['Data tidak ditemukan'];
    }


    /**
     * Api Kecamatan dari Kota yang di-pilih
     * 
     * @param prov_id = id kota
     * @return Json
     */
    public function kecamatan(Request $request)
    {
        if ($request->kota_id) {
            return Kecamatan::where('kota_id', $request->kota_id)->orderBy('name')->get();
        }
        return ['Data tidak ditemukan'];
    }
}
