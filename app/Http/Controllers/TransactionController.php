<?php

namespace App\Http\Controllers;
use App\Imports\TransactionImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    public function index(){
        $data = Transaction::all();
        return view('import',['data'=>$data]);
    }

    public function store(){

        Excel::Import(new TransactionImport, request()->file('import_file'));
        return redirect()->back();
    }
}
