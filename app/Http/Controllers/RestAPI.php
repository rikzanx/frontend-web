<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class RestAPI
{
    protected $url;
    protected $accessToken;
    protected $client;
    protected $headers;

    public function __construct(Client $client)
    {
        $this->url = 'https://api.ternaknesia.com';
        $this->client= $client;
        $this->headers = [
            'cache-control' => 'no-cache',
            'Accept'        => 'application/json',
        ];
    }

    public function getRequest(string $uri = null,  array $query = [])
    {
        try {
            $full_path = $this->url;
            $full_path .= $uri;

            $this->accessToken = session()->has('access_token') ? session()->get('access_token') : null;
            $this->headers['Authorization'] = 'Bearer ' . $this->accessToken;
            $request = $this->client->get($full_path, [
                'headers'         => $this->headers,
                'connect_timeout' => true,
                'http_errors'     => true,
                'query'           => $query,
            ]);

            $response = $request ? $request->getBody()->getContents() : null;
            $status = $request ? $request->getStatusCode() : 500;

            if ($response && $status === 200 && $response !== 'null') {
                return (object) json_decode($response);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if($e->getResponse() == null){
                return json_decode($e);
            } else {
                return json_decode($e->getResponse()->getBody()->getContents());    
            }            
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return json_decode($e->getResponse());
        }
    }

    public function getRequestToken(string $uri = null,  array $query = [],string $token = null)
    {
        try {
            $full_path = $this->url;
            $full_path .= $uri;

            $this->headers['Authorization'] = 'Bearer ' . $token;
            $request = $this->client->get($full_path, [
                'headers'         => $this->headers,
                'connect_timeout' => true,
                'http_errors'     => true,
                'query'           => $query,
            ]);

            $response = $request ? $request->getBody()->getContents() : null;
            $status = $request ? $request->getStatusCode() : 500;

            if ($response && $status === 200 && $response !== 'null') {
                return (object) json_decode($response);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents());
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return json_decode($e->getResponse());
        }
    }

    public function postRequest(string $uri = null, array $post_params = [], array $multipart = []){
        try {
            $full_path = $this->url;
            $full_path .= $uri;

            $this->accessToken = session()->has('access_token') ? session()->get('access_token') : null;
            $this->headers['Authorization'] = 'Bearer ' . $this->accessToken;

            $parameter = [
                'headers'         => $this->headers,
                'connect_timeout' => true,
                'http_errors'     => true,
            ];

            if(!empty($multipart)){
                $parameter['multipart'] = $multipart;
            } else {
                $parameter['form_params'] = $post_params;
            }

            $request = $this->client->post($full_path, $parameter);

            $response = $request ? $request->getBody()->getContents() : null;
            $status = $request ? $request->getStatusCode() : 500;

            if ($response && $response !== 'null') {
                return (object) json_decode($response);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            dd($e);
            return json_decode($e->getResponse()->getBody()->getContents());
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return json_decode($e->getResponse());
        }
    }
    public function postRequestToken(string $uri = null, array $post_params = [], array $multipart = [],string $token=null){

        try {
            $full_path = $this->url;
            $full_path .= $uri;

            $this->headers['Authorization'] = 'Bearer ' . $token;

            $parameter = [
                'headers'         => $this->headers,
                'connect_timeout' => false,
                'http_errors'     => true,
            ];
            if(!empty($multipart)){
                $parameter['multipart'] = $multipart;
            } else {
                $parameter['form_params'] = $post_params;
            }

            $request = $this->client->post($full_path, $parameter);

            $response = $request ? $request->getBody()->getContents() : null;
            $status = $request ? $request->getStatusCode() : 500;

            if ($response && $response !== 'null') {
                return (object) json_decode($response);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            dd($e);
            return json_decode($e->getResponse()->getBody()->getContents());
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return json_decode($e->getResponse());
        }
    }
}
