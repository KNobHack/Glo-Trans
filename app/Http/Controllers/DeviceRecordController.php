<?php

namespace App\Http\Controllers;

use App\Models\DeviceRecord;
use App\Http\Requests\StoreDeviceRecordRequest;
use App\Http\Requests\UpdateDeviceRecordRequest;

class DeviceRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    function dataMasuk()
    {
        $data_in = DeviceRecord::whereNull('verified_at')->get();

        return view('device_record.masuk', ['data_in' => $data_in]);
    }

    function dataTerverifikasi()
    {
        $verified_data = DeviceRecord::whereNotNull('verified_at')->get();

        return view('device_record.terverifikasi', ['verified_data' => $verified_data]);
    }

    function verify(DeviceRecord $deviceRecord)
    {
        $deviceRecord->verify()->save();

        return redirect()->back();
    }

    public function reject(DeviceRecord $deviceRecord)
    {
        $deviceRecord->delete();

        return redirect()->back();
    }
}
