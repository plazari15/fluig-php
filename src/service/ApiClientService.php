<?php

namespace PedroLazari\PhpFluig\Service;

use GuzzleHttp\Client;
use PedroLazari\PhpFluig\Service\OauthService;
use PedroLazari\PhpFluig\Service\HandlerFluigResponse;
use PedroLazari\PhpFluig\Model\Dataset;

class ApiClientService
{
    use HandlerDotenv;

    public function get($endpoint){
        $response = new HandlerFluigResponse;
        $this->parseDotenv();
        $stack = new OauthService;
        
		try{
	    	$client = new Client([
	    		'base_uri' => getenv('FLUIG_URI') . ':' . getenv('FLUIG_PORT'),
	    		'handler' => $stack->getApiAuth()
	    	]);
	 
	    	$res = $client->get($endpoint, ['auth' => 'oauth']);
            return $response->parseResponse($res);

        }catch(Exception $e){
            return $e->getMessage();
        }

	}
		
	public function post($endpoint, $data){
		$response = new HandlerFluigResponse;
        $this->parseDotenv();

        $res = null;
		try{

            $stack = new OauthService;
	    	$client = new Client([
	    		'base_uri' => getenv('FLUIG_URI') . ':' . getenv('FLUIG_PORT'),
	    		'handler' => $stack->getApiAuth(),
	    		'auth' => 'oauth'
			]);

	        $res = $client->post($endpoint, ['json' => $data]);

			return $response->parseResponse($res);

		}catch(\Exception $e){
			return  $e->getMessage();
        }
    }
}