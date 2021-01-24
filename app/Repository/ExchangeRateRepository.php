<?php


namespace App\Repository;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ExchangeRateRepository
{
    public function getRatePrivateBank() {
        $uri = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';

        if (!session() -> has('exchangeRate')) {
            $request = (new Client())->request('GET', $uri);
            $response = $request->getBody()->getContents();
            session()->put('exchangeRate', json_decode($response));
        }

        return session()->get('exchangeRate');
    }
}
