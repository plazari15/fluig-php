<?php

namespace PedroLazari\PhpFluig\Service;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class OauthService
{
    
    public function getApiAuth(){

        //try{
	   		$middleware = new Oauth1([
                'consumer_key'    => $_ENV['FLUIGPHP.FLUIG_CONSUMER_KEY'],
                'consumer_secret' => $_ENV['FLUIGPHP.FLUIG_CONSUMER_SECRET'],
                'token'           => $_ENV['FLUIGPHP.FLUIG_ACCESS_TOKEN'],
                'token_secret'    => $_ENV['FLUIGPHP.FLUIG_TOKEN_SECRET']
	    	]);

//	    	return $middleware;
//
//		}catch(Exception $e){
//			return $e->getMessage();
//		}

		return $middleware;
    }

    public function getApiAuthPost(){

        //try{
        $middleware = new Oauth1([
            'consumer_key'    => $_ENV['FLUIGPHP.FLUIG_CONSUMER_KEY_POST'],
            'consumer_secret' => $_ENV['FLUIGPHP.FLUIG_CONSUMER_SECRET_POST'],
            'token'           => $_ENV['FLUIGPHP.FLUIG_ACCESS_TOKEN_POST'],
            'token_secret'    => $_ENV['FLUIGPHP.FLUIG_TOKEN_SECRET_POST']
        ]);

//	    	return $middleware;
//
//		}catch(Exception $e){
//			return $e->getMessage();
//		}

        return $middleware;
    }

}