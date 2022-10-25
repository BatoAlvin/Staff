<?php

namespace App\Exports;

use App\Models\Staffrole;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StaffrolesExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {

        $staffroles = Staffrole::get();
        return view('staffroles.export',['staffroles' => $staffroles]);
    }


}
