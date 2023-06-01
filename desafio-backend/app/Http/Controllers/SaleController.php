<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Jobs\SaleCsvProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class SaleController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function upload_csv_records(Request $request)
    {
        if( $request->has('csv') ) {

            $csv    = file($request->csv);
            $chunks = array_chunk($csv,1000);
            $header = [];

            foreach ($chunks as $key => $chunk) {
            $data = array_map('str_getcsv', $chunk);
                if($key == 0){
                    $header = $data[0];
                    unset($data[0]);
                }
            }
            return $data;
        }
        return "please upload csv file";
    }
}