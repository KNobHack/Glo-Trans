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

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(StoreDeviceRecordRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(DeviceRecord $deviceRecord)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(DeviceRecord $deviceRecord)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdateDeviceRecordRequest $request, DeviceRecord $deviceRecord)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(DeviceRecord $deviceRecord)
    // {
    //     //
    // }
}
