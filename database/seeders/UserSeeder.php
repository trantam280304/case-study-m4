<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new User();
        $item->name = "Trần Hữu Nhân";
        $item->email = "tranhuunhan010104@gmail.com";
        $item->password = Hash::make('123456789');
        $item->address = 'Quảng Trị';
        $item->phone  = "0702339203";
        $item->image ='a26.jpg';
        $item->gender ='Nam';
        $item->birthday ='2004/01/01';
        $item->group_id ='1';
        $item->image ='thang.ipg';
        $item->save();
    }
}