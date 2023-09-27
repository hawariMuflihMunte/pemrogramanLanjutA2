<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDataController extends Controller
{
    private $data;

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function __invoke()
    {
        $this->data = [
            "nim" => "200170120",
            "nama" => "Hawari Muflih Munte",
            "jurusan" => "Teknik Informatika",
            "programStudi" => "Teknik Informatika",
            "mataKuliah" => "Pemrograman Lanjut A2",
            "mataKuliahSemesterIni" => [
                "Pemrograman Lanjut",
                "Database Terdistribusi",
                "Internet of Things",
                "Riset Teknologi Informasi",
                "Mobile Programming"
            ]
        ];

        return view('studentdata', [
            'studentData' => $this->getData()
        ]);
    }
}
