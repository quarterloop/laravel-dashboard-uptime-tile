<?php

namespace Quarterloop\UptimeTile\Services;

use Illuminate\Support\Facades\Http;

class UptimeAPI
{
  public static function getUptime(string $url, string $key): array
  {

      $response = Http::withHeaders([
        'x-api-key' => $key,
      ])->post('https://api.geekflare.com/brokenlink', [
        'url' => $url,
      ])->json();

      return $response;
  }
}
