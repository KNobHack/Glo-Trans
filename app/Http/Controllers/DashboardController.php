<?php

namespace App\Http\Controllers;

use App\Models\DeviceRecord;

class DashboardController extends Controller
{
    function index()
    {
        $data = DeviceRecord::withTrashed()->get();

        $data_masuk = $data->count();
        $data_terverifikasi = $data
            ->whereNull('deleted_at')
            ->whereNotNull('verified_at')
            ->count();
        $data_ditolak = $data
            ->whereNotNull('deleted_at')
            ->count();
        $data_belum_diproses = $data
            ->whereNull('deleted_at')
            ->whereNull('verified_at')
            ->count();

        return view('dashboard.index', [
            'tot_data_masuk' => $data_masuk,
            'tot_data_terverifikasi' => $data_terverifikasi,
            'tot_data_ditolak' => $data_ditolak,
            'tot_data_belum_diproses' => $data_belum_diproses,
        ]);
    }
}
