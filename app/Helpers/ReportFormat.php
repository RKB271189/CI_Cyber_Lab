<?php

namespace App\Helpers;

trait ReportFormat
{
    public function formatReport(array $arrayJson): array
    {
        return $arrayJson['report_detail'];
    }
    public function formatThreat(array $arrayJson): array
    {
        return $arrayJson['Threatened'];
    }
    public function formatRisk(array $arrayJson): array
    {
        return $arrayJson['Digital_User_Risk'];
    }
}
