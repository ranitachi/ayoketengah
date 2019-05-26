<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publikasi;
use App\Models\Galeri;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak=$this->getkontak();
        $profil=$this->getprofil();
        $berita=$this->getberita();
        // return $berita;
        return view('home')->with('kontak',$kontak)->with('profil',$profil)->with('berita',$berita);
    }

    public function about_us()
    {
        $kontak=$this->getkontak();
        $profil=$this->getprofil();
        // return $profil;
        return view('front.content.aboutus')->with('kontak',$kontak)->with('profil',$profil);
    }
 
    //Artikel
    public function articles(Request $request)
    {
        $kontak=$this->getkontak();
        $data=Publikasi::where('flag',1)->with('kat')->with('author')->orderBy('created_at')->paginate(10);
        // return $profil;
        if ($request->ajax()) {
            return view('frontend.content.artikel-data', compact('data'));
        }
        return view('front.content.artikel')->with('kontak',$kontak)->with('data',$data);
    }
    public function articles_detail($judul)
    {
        $det=Publikasi::where('judul_slug',$judul)->first();
        $kontak=$this->getkontak();
        $articles=Publikasi::where('id','!=',$det->id)->limit(4)->with('kat')->with('author')->orderBy('created_at')->get();
        return view('front.content.artikel-detail')->with('kontak',$kontak)->with('data',$det)->with('articles',$articles);
    }
    
    //Galeri
    public function gallery(Request $request)
    {
        $kontak=$this->getkontak();
        $data=Galeri::where('flag',1)->with('author')->orderBy('created_at')->paginate(8);
        // return $profil;
        if ($request->ajax()) {
            return view('frontend.content.galeri-data', compact('data'));
        }
        return view('front.content.galeri')->with('kontak',$kontak)->with('data',$data);
    }
}
