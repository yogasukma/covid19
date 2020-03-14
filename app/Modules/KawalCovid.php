<?php

namespace App\Modules;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class KawalCovid
{
    protected $url = 'https://kawalcovid19.harippe.id/api/summary';

    public function get()
    {
        $client = new Client();
        $request = new Request('GET', $this->url);

        $promise = $client->sendAsync($request)->then(function ($response) {
            $data = json_decode($response->getBody(), true);

            (new UpdateData())->save([
                'patients' => [
                    'terkonfirmasi' => $data['confirmed']['value'],
                    'perawatan' => $data['activeCare']['value'],
                    'sembuh' => $data['recovered']['value'],
                    'meninggal' => $data['deaths']['value'],
                ],
            ]);
        });

        $promise->wait();
    }
}
