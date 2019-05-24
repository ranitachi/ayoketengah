<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Service\KontakService;
use Auth;
use Validator;
class KontakBackendController extends Controller
{
    private $kontakService;

    public function __construct()
    {
        $this->kontakService = new KontakService();
    }
    public function index()
    {
        $data=$this->kontakService->all();
        return view('backend.content.kontak.index')->with('data',$data);
    }

    public function proses(Request $request)
    {
        // return $request->all();
        $c=$this->kontakService->simpan($request->all());
        if($c)
            return redirect('admin-kontak')->with('pesan','Data Kontak Berhasil Disimpan');
        else
            return redirect('admin-kontak')->with('error','Data Kontak Gagal Disimpan');
    }

    public function json_kontak()
    {
        $data=$this->kontakService->all_select();
        return $data;
    }
}
