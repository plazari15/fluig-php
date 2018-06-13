<?php

namespace PedroLazari\PhpFluig\Service;

use GuzzleHttp\Client;
use PedroLazari\PhpFluig\Service\OauthService;
use PedroLazari\PhpFluig\Service\HandlerFluigResponse;
use PedroLazari\PhpFluig\Model\Dataset;

class ApiClientService
{
    use HandlerDotenv;

    public function __construct()
    {
        $this->parseDotenv();
    }

    public function get($endpoint){
        $response = new HandlerFluigResponse;

        $stack = new OauthService;

		try{
	    	$client = new Client([
	    		'base_url' => getenv('FLUIG_URI'),
                'defaults' => ['auth' => 'oauth']
	    	]);

	    	$client->getEmitter()->attach($stack->getApiAuth());

	    	$res = $client->get($endpoint);
            return $response->parseResponse($res);

        }catch(Exception $e){
            return $e->getMessage();
        }

	}
		
	public function post($endpoint, $data){
		$response = new HandlerFluigResponse;

        $res = null;
		try{

            $stack = new OauthService;
	    	$client = new Client([
	    		'base_url' => getenv('FLUIG_URI'),
	    		'auth' => 'oauth'
			]);

	    	$client->getEmitter()->attach($stack->getApiAuth());

	        $res = $client->post($endpoint, ['json' => $data]);

			return $response->parseResponse($res);

		}catch(\Exception $e){
			return  $e->getMessage();
        }
    }
}