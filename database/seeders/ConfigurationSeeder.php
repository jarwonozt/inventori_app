<?php

namespace Database\Seeders;

use App\Models\Admin\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = new Configuration();
        $data->name = config('app.name');
        $data->email = 'admin@gmail.com';
        $data->description = '-';
        $data->tags = 'laravel, jcms';
        $data->logo = '-';
        $data->owner_id = 1;
        $data->created_by = 1;
        $data->address = 'Jl. Pegangsaan Timur, No 2, Banyumas';
        $data->phone = '082145095183';
        $data->whatsapp = '6282145095183';
        $data->twitter = '-';
        $data->facebook = '-';
        $data->instagram = '-';
        $data->tiktok = '-';
        $data->status = '-';
        $data->save();

        echo 'Configuration berhasil disimpan.';
    }
}
