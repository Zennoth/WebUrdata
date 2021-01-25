<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecturer = new Lecturer();
        $lecturer->nip = '23812';
        $lecturer->nidn = '10001';
        $lecturer->lecturer_name = 'Rel';
        $lecturer->lecturer_email = 'rel@lecturer.com';
        $lecturer->description = 'hoahm';
        $lecturer->lecturer_photo = '';
        $lecturer->lecturer_gender = '0';
        $lecturer->lecturer_phone = '0812456';
        $lecturer->lecturer_line_account = 'rel_';
        $lecturer->department_id = '1';
        $lecturer->title_id = '1';
        $lecturer->jaka_id = '1';
        $lecturer->save();

        $lecturer = new Lecturer();
        $lecturer->nip = '23813';
        $lecturer->nidn = '10002';
        $lecturer->lecturer_name = 'Sahlun';
        $lecturer->lecturer_email = 'sahlun@lecturer.com';
        $lecturer->description = 'Numpanglwt';
        $lecturer->lecturer_photo = '';
        $lecturer->lecturer_gender = '0';
        $lecturer->lecturer_phone = '08123456';
        $lecturer->lecturer_line_account = 'lan_';
        $lecturer->department_id = '1';
        $lecturer->title_id = '1';
        $lecturer->jaka_id = '1';
        $lecturer->save();
    }
}
