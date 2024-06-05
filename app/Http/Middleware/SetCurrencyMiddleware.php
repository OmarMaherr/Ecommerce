<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;

class SetCurrencyMiddleware
{
    protected $client;

    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!Cache::has('currency_rate')) {
            $defaultRates = [];

            $from = 'JOD';
            $amount = 1;
            $to_array = ['KWD', 'USD', 'SAR', 'OMR', 'EUR'];
            // foreach ($to_array as $to) {

            //     $response = $this->client->request('GET', 'https://api.fastforex.io/convert', [
            //         'query' => [
            //             'from' => $from,
            //             'to' => $to,
            //             'amount' => $amount,
            //             'api_key' => '63e3cde7c5-a8f471e94b-sdj0yb',
            //         ],
            //         'headers' => [
            //             'Accept' => 'application/json',
            //         ],
            //     ]);

            //     // Decode the JSON response
            //     $data = json_decode($response->getBody()->getContents(), true);
            //     $rate = 0;
            //     if (isset($data['result'][$to])) {
            //         $rate = $data['result'][$to];

            //         $defaultRates[$to] = $rate;

            //     }
            // }
            $defaultRates['JOD'] = 1;
            $defaultRates['USD'] = 1.41;
            $defaultRates['SAR'] = 5.29;
            $defaultRates['KWD'] = 0.43;
            $defaultRates['OMR'] = 0.54;
            $defaultRates['EUR'] = 1.34;

            Cache::put('currency_rate', $defaultRates, now()->addHours(12));
        }
        return $next($request);
    }
}
