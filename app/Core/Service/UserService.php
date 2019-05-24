<?php

namespace App\Core\Service;


use App\User;
use Illuminate\Support\Facades\DB;

class UserService
{

    public function all($limit=null)
    {
        $user=User::orderBy('created_at','desc')->get();
        
        if($limit!=null)
            $user=User::orderBy('created_at','desc')->limit($limit)->get();
        
        return $user;
    }

    public function show($id){
        $user = User::where('id', $id)->first();
        return $user;
    }

    public function simpan($data)
    {
        // return $data;
        $new=new User;
        $new->name =  $data['name'];
        $new->nip =  $data['nip'];
        $new->email =  $data['email'];
        $new->password =  bcrypt($data['password']);
        $new->level =  $data['level'];
        $new->flag =  $data['flag'];
        $new->telp =  $data['telp'];
        $new->foto =  $data['foto'];
        $c=$new->save();
        return $c;
    }
    public function edit($data,$id)
    {
        // return $data;
        $new=User::find($id);
        $new->name =  $data['name'];
        $new->nip =  $data['nip'];
        $new->email =  $data['email'];
        
        if(isset($data['password']))
        {
            if($data['password']!='')
                $new->password =  bcrypt($data['password']);
        }   
        
        $new->level =  $data['level'];
        $new->flag =  $data['flag'];
        $new->telp =  $data['telp'];
        $new->foto =  $data['foto'];
        $c=$new->save();
        return $c;
    }

    public function hapus($id)
    {
        return User::find($id)->delete();
    }

    public function verifiy_email($id)
    {
        $user=User::find($id);
        $user->email_verified_at=date('Y-m-d H:i:s');
        $user->flag=1;
        $c=$user->save();
        return $c;
    }
}