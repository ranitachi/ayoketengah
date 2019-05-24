<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Models\File;
use App\Models\Permohonan;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getkontak()
    {
        try
        {
            $url=url('/api/json-kontak');
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $k=collect($data);
        }
        catch(\Exception $e)
        {
            $k=array();
        }

        $kontak=array();
        foreach($k as $i =>$v)
        {
            $kontak[str_slug($v->nama)]=$v->value;
        }
        return $kontak;
    }
    
    public function getslider()
    {
        try
        {
            $url=url('/api/json-slider/3/true');
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $slide=collect($data);
        }
        catch(\Exception $e)
        {
            $slide=array();
        }

        return $slide;
    }

    public function getprofil()
    {
        try
        {
            $url=url('/api/json-profil/all');
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $profil=collect($data);
        }
        catch(\Exception $e)
        {
            $profil=array();
        }

        return $profil;
    }
    
    public function getberita()
    {
        try
        {
            $url=url('/api/json-berita/5/true');
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $profil=collect($data);
        }
        catch(\Exception $e)
        {
            $profil=array();
        }

        return $profil;
    }
    
    public function getberitapaginate($page)
    {
        try
        {
            $url=url('/api/json-berita-paginate/'.$page);
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $berita=collect($data);
        }
        catch(\Exception $e)
        {
            $berita=array();
        }

        return $berita;
    }

    public function getgaleri()
    {
        try
        {
            $url=url('/api/json-galeri/5/true');
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $galeri=collect($data);
        }
        catch(\Exception $e)
        {
            $galeri=array();
        }

        return $galeri;
    }
    
    public function getkategori($jenis)
    {
        try
        {
            $url=url('/api/json-kategori-by/'.$jenis);
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $kategori=collect($data);
        }
        catch(\Exception $e)
        {
            $kategori=array();
        }

        return $kategori;
    }
    public function getdinas()
    {
        try
        {
            $url=url('/api/json-dinas/');
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $dinas=collect($data);
        }
        catch(\Exception $e)
        {
            $dinas=array();
        }

        return $dinas;
    }
    
    public function getdinasdata()
    {
        try
        {
            $url=url('/api/json-dinas-data/');
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $dinas=collect($data);
        }
        catch(\Exception $e)
        {
            $dinas=array();
        }

        return $dinas;
    }

    public function get_sub_bykat($kat_id)
    {
        //json-sub-by-kat
        try
        {
            $url=url('/api/json-sub-by-kat/'.$kat_id);
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $kategori=collect($data);
        }
        catch(\Exception $e)
        {
            $kategori=array();
        }

        return $kategori;
    }

    public function countdatainformasi()
    {
        $file=File::where('status',1)->with('kategori')->get();
        $permohonan=Permohonan::where('status',0)->get();
        $fl=$unduhan=$pemohonan=0;
        $cnt=array();

        
        // return $file;
        foreach($file as $k=>$v)
        {
            if(isset($v->kategori->kategori))
            {
                $cnt[$v->kategori->kategori][]=$v;
            }
            $unduhan+=$v->download;   
        }

        $fl=$file->count();
        $data['count']=$cnt;
        $data['unduhan']=$unduhan;
        $data['jumlah']=$fl;
        $data['permohonan']=$permohonan->count();
        return $data;
    }
}
