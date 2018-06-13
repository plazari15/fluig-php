<?php

namespace PedroLazari\PhpFluig\Service;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use PedroLazari\PhpFluig\Service\HandlerDotenv;

class OauthService
{
    use HandlerDotenv;
    
    public function getApiAuth(){
        
        $this->parseDotenv();

        //try{
	   		$middleware = new Oauth1([
	    		'consumer_key'    => getenv('FLUIG_CONSUMER_KEY'),
	    		'consumer_secret' => getenv('FLUIG_CONSUMER_SECRET'),
	    		'token'           => getenv('FLUIG_ACCESS_TOKEN'),
	    		'token_secret'    => getenv('FLUIG_TOKEN_SECRET')
	    	]);

//	    	return $middleware;
//
//		}catch(Exception $e){
//			return $e->getMessage();
//		}

		return $middleware;
    }

    public function getApiAuthPost(){

        $this->parseDotenv();

        //try{
        $middleware = new Oauth1([
            'consumer_key'    => getenv('FLUIG_CONSUMER_KEY_POST'),
            'consumer_secret' => getenv('FLUIG_CONSUMER_SECRET_POST'),
            'token'           => getenv('FLUIG_ACCESS_TOKEN_POST'),
            'token_secret'    => getenv('FLUIG_TOKEN_SECRET_POST')
        ]);

//	    	return $middleware;
//
//		}catch(Exception $e){
//			return $e->getMessage();
//		}

        return $middleware;
    }

}