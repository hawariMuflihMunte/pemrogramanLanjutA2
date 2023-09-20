<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentData extends Controller
{
    public function index()
    {
        $studentData = [
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
        return view('student_data', [
            'studentData' => $studentData
        ]);
    }
}
