<?php

namespace App\Http\Controllers\DadataUpdater;

use App\Http\Controllers\Controller;
use App\Services\Dadata\OrganizationApi;

class DadataController extends Controller
{
    public function updater(OrganizationApi $api)
    {
//        $response = $api->findByINN(7710641442);
        $response = $api->findByName('МЕДСИ');
        $jsonContent = $response->getBody()->getContents();

        $result = [
            'header' => $response->getHeaders(),
            'body' => $response->getBody()->getContents(),
            'bodydecode' => json_decode($jsonContent, true),
        ];

        dd($result);
//        dd(json_decode($result, true));
    }
}
