<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Service\UserService;
use Auth;
use Validator;

class UserBackendController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $user=$this->userService->all();
        return view('backend.content.user.index')
                ->with('user',$user);
    }
    public function form($id=-1)
    {
        $user=array();
        if($id!=-1)
            $user=$this->userService->show($id);
        
        return view('backend.content.user.form')
                ->with('user',$user)
                ->with('id',$id);
    }

    public function proses(Request $request,$id)
    {
        if($id!=-1)
        {
            Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'level' => 'required',
                'flag' => 'required'
            ])->validate();
        }
        else
        {
            Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'level' => 'required',
                'password' => 'required',
                'flag' => 'required'
            ])->validate();
        }

        $data=$request->all();

        if($id==-1)
        {
            $save = $this->userService->simpan($data);
            if($save)
                return redirect()->route('admin-user.index')->with('pesan','Data User Berhasil Disimpan');
            else
                return redirect()->route('admin-user.index')->with('error','Data User Gagal Disimpan');
        }
        else
        {
            $save = $this->userService->edit($data,$id);
            if($save)
                return redirect()->route('admin-user.index')->with('pesan','Data User Berhasil Di Edit');
            else
                return redirect()->route('admin-user.index')->with('error','Data User Gagal Di Edit');
        }

        
    }

    public function json_user()
    {
        $user=$this->userService->all();
        $data=array();
        $no=1;
        foreach($user as $idx=>$val)
        {
            $data[$idx][]=$no;
            if($val->foto=='')
                $data[$idx][]='<img src="'.asset('image/nophoto.jpg').'" style="width:90px;">';
            else
                $data[$idx][]='<img src="'.asset($val->foto).'" style="width:90px;">';
            $data[$idx][]='<b>'.$val->name.'</b>';
            $data[$idx][]='Email : '.$val->email.'<br>Telp : '.$val->telp;
            $data[$idx][]=($val->level==0 ? '<span class="label ungu-bg"><i class="icon-user"></i> Super Admin</span>' : ($val->level==1 ? '<span class="label label-success"><i class="icon-user"></i> Operator</span>': ($val->level==2 ? '<span class="label label-success"><i class="icon-user"></i> User Umum</span>': '<span class="label label-primary"><i class="icon-checkmark"></i> Team</span>')));
            $data[$idx][]=($val->flag==0 ? '<span class="label label-default">Tidak Aktif</span>' : '<span class="label label-success"><i class="icon-checkmark"></i> Aktif</span>');

            $data[$idx][]='<ul class="icons-list">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="'.route('admin-user.form',$val->id).'"><i class="icon-pencil7"></i> Edit</a></li>
										<li><a href="javascript:hapus(\''.$val->id.'\')"><i class="icon-trash"></i> Hapus</a></li>
									</ul>
								</li>
							</ul>';

            $no++;
        }

        if(count($data)!=0)
        {
            $dt['data']=$data;
            // $dt['status']=true;
        }
        else
        {
            $dt['data']=$data;
            // $dt['status']=false;
        }
        return $dt;
    }

    public function destroy($id)
    {
        $c=$this->userService->hapus($id);
        if($c)
            return redirect()->route('admin-user.index')->with('pesan','Data User Berhasil Di Hapus');
        else
            return redirect()->route('admin-user.index')->with('error','Data User Gagal Di Hapus');
    }
}