<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\Client\Export;

use Illuminate\Http\Request as Request;

/**
 * Description of ExportService
 *
 * @author PACO
 */
class ExportService {

    protected $exportType;
    protected $type;

    public function __construct() {
        
    }

    /**
     * Check if given export type is allowed
     * @param Request $request
     * @return type
     */
    public function checkExport(Request $request) {
        if ($request->has('exportType') && in_array($request->get('exportType', ''), \Config::get('export.exportTypes'))) {
            return $this->exportType = $request->get('exportType');
        }
    }

    /**
     * Create export file for contragents
     * @param type $excelData
     * @return boolean
     */
    public function exportTo($excelData, $type) {
        $this->type = $type;
        $allowed = $this->getAllowedColumns();

        foreach ($excelData as $row) {
            //access multidientionall array by laravel dot notation
            $flattened = array_dot($row);

            //merge two arrays to filter only allowed columns to export
            $tmpFilter = array_intersect_key($flattened, $allowed);
            //merge two array to reorder array keys
            $filtered[] = array_merge($allowed, $tmpFilter);
        }

        foreach ($allowed as $key => $heading) {
            $headingsTranslated[$key] = $this->translateHeaderColumns($heading);
        }

        $headings = array_values($headingsTranslated);

        \Excel::create($this->getFileName(), function($excel) use ($filtered, $headings) {
            $excel->sheet('Sheet1', function($sheet) use ($filtered, $headings) {
                $sheet->fromArray($filtered, null, 'A1', true, true);
                $sheet->prependRow(1, $headings);
            });
        })->store($this->exportType, $this->getExportPath());

        return response()->download($this->getExportPath() . DIRECTORY_SEPARATOR . $this->getFileName() . '.' . $this->exportType)
                        ->deleteFileAfterSend(true);
    }

    /**
     * Return export path
     * @return type
     */
    protected function getExportPath() {
        return storage_path('export');
    }

    /**
     * Check allowed culomns for export
     * @return type
     */
    public function getAllowedColumns() {
        return \Config::get('export.' . $this->type . '.allowed-columns');
    }

    /**
     * Translate excel header columns
     * @param type $heading
     * @return type
     */
    public function translateHeaderColumns($heading) {
        return \UI::translate($this->type . '.' . $heading);
    }

    /**
     * Return file name
     * @return type
     */
    public function getFileName() {
        return $this->type;
    }

}
