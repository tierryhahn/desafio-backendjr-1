<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Jobs\SaleCsvProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function upload_csv_records(Request $request)
    {
        if ($request->has('csv')) {
            $csv = file($request->csv);
            $chunks = array_chunk($csv, 1000);
            $header = [];
            $data = [];

            foreach ($chunks as $key => $chunk) {
                $chunkData = array_map('str_getcsv', $chunk);
                if ($key == 0) {
                    $header = $chunkData[0];
                    unset($chunkData[0]);
                }
                $data = array_merge($data, $chunkData);
            }

            $saleData = [];
            foreach ($data as $row) {
                $rowData = array_combine($header, $row);
                $rowData['altura'] = str_replace(',', '.', $rowData['altura']);
                $rowData['peso'] = str_replace(',', '.', $rowData['peso']);
                $rowData['data_nasc'] = date('Y-m-d', strtotime(str_replace('/', '-', $rowData['data_nasc'])));

                $saleData[] = $rowData;
            }

            Sale::insert($saleData);

            return redirect()->back()->with('success', 'Dados do arquivo CSV foram enviados para o banco de dados. Acesse /sales/json para visualizar o banco de dados.');
        }

        return redirect()->back()->with('error', 'Por favor, envie um arquivo CSV.');
    }

    public function getJsonData()
    {
        $sales = Sale::all();

        return response()->json($sales);
    }
}