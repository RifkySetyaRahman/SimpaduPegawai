<?php

namespace App\Http\Controllers\Proxy;

use Illuminate\Http\Request;
use App\Services\HttpProxyService;
use App\Http\Controllers\Controller;

class ProxyController extends Controller
{
    protected $proxyService;

    /**
     * Constructor untuk inject service
     */
    public function __construct(HttpProxyService $proxyService)
    {
        $this->proxyService = $proxyService;
    }

    /**
     * Method utama proxy
     */
    public function proxy(Request $request)
    {
        $result = $this->proxyService->send($request);

        // Jika terjadi error (misalnya URL tidak valid atau method tidak diizinkan)
        if (isset($result['error'])) {
            return response()->json([
                'error' => $result['error'],
                'message' => $result['message'] ?? null
            ], $result['status']);
        }

        // Berhasil, kirim response ke klien
        return response($result['body'], $result['status'])
               ->withHeaders($result['headers']);
    }
}
