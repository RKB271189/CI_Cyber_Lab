<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\ReportFormat;

class DashboardController extends BaseController
{
    use ReportFormat;
    private $arrayJson = [];
    public function __construct()
    {
        $inputFilePath = ROOTPATH . 'writable/inputs/json-data.json';
        $inputJson = file_get_contents($inputFilePath);
        $this->arrayJson = json_decode($inputJson, true);
    }
    public function report()
    {
        $report = $this->formatReport($this->arrayJson);
        return view('report', ['report' => $report]);
    }
    public function threat()
    {
        $threat = $this->formatThreat($this->arrayJson);
        return view('threat', ['threat' => $threat[0]]);
    }
    public function risk()
    {
        $risk = $this->formatRisk($this->arrayJson);
        return view('risk', ['risk' => $risk[0]]);
    }
}
