<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Kontak;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        User::create([
            'name'=>'Administrator',
            'email'=>'admin@email.com',
            'password'=>bcrypt('123'),
            'level'=>'0',
            'flag'=>'1',
        ]);

        $kontak=['Alamat'=>'-','Telepon'=>'-','Email'=>'-','Website'=>'-','Facebook'=>'-','Twitter'=>'-','Instagram'=>'-','Longitude'=>'-','Latitude'=>'-'];
        foreach($kontak as $index=>$value)
        {
            $new=new Kontak;
            $new->nama=$index;
            $new->nilai=$value;
            $new->flag=1;
            $new->save();
        }
    }
}
