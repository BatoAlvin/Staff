<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StaffsExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {

        $staffs = Staff::get();
        return view('staff.export',['staffs' => $staffs]);
    }


}
