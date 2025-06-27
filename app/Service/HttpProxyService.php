<?php

<<<<<<< HEAD
namespace App\Services;
=======
namespace app\Services;
>>>>>>> 089f44e84586d05e9ee02a44a3e57a5d0cbc7ed3

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpProxyService
{
    protected array $allowedMethods = ['get', 'post', 'put', 'patch'];

    public function send(Request $request): array
    {
        $url = $request->query('url');
        $method = strtolower($request->method());

        if (!$url) {
            return ['error' => 'Target URL is required', 'status' => 400];
        }

        if (!in_array($method, $this->allowedMethods)) {
            return ['error' => 'HTTP method not supported', 'status' => 405];
        }

        try {
            $http = Http::withHeaders($request->headers->all());

            if (in_array($method, ['post', 'put', 'patch'])) {
                $response = $http->$method($url, $request->all());
            } else {
                $response = $http->$method($url);
            }

            return [
                'body' => $response->body(),
                'status' => $response->status(),
                'headers' => $response->headers(),
                'raw' => $response
            ];
        } catch (\Exception $e) {
            return [
                'error' => 'Proxy request failed',
                'message' => $e->getMessage(),
                'status' => 500
            ];
        }
    }
}
