<?php
App::uses('Shell', 'Console');

class MainShell extends AppShell{
    
    public function exchange(){
      
    configure::write('debug', 0);
        $this->loadModel('ExchangeRate');  

        $secretKey = 'MWE1ODcwMmViNjIxNDNlNGI0YjM3NjdiNzEzY2M2OWYxNDRmYmU5NTIzMDQ0MWRlOTc4MTcxZjY2ODg3MjUxOQ';
        $publicKey = 'ODk0ODQzYjZjNzM0NGY3NTk0MWM2YjM0NWExMDllMTE';
        $timestamp = time();
        $payload = $timestamp . '.' . $publicKey;
        $hash = hash_hmac('sha256', $payload, $secretKey, true);
        $hexHash = array_shift(unpack('H*', $hash));
        $signature = $payload . '.' . $hexHash;
        $tickerUrl = "https://apiv2.bitcoinaverage.com/indices/global/ticker/BTCUSD"; 
        $aHTTP = array(
          'http' =>
            array(
            'method'  => 'GET',
            )
        );
        $aHTTP['http']['header']  = "X-Signature: " . $signature;
        $context = stream_context_create($aHTTP);
        $content = file_get_contents($tickerUrl, false, $context);
        $cont = json_decode($content);
        $value = $cont->ask;
        $this->ExchangeRate->updateAll(array('ExchangeRate.id'=>1,'ExchangeRate.exchange_money'=> $value));
        exit;
    }

    public function cad(){

    configure::write('debug', 0);
        $this->loadModel('ExchangeRate');  

        $secretKey = 'MWE1ODcwMmViNjIxNDNlNGI0YjM3NjdiNzEzY2M2OWYxNDRmYmU5NTIzMDQ0MWRlOTc4MTcxZjY2ODg3MjUxOQ';
        $publicKey = 'ODk0ODQzYjZjNzM0NGY3NTk0MWM2YjM0NWExMDllMTE';
        $timestamp = time();
        $payload = $timestamp . '.' . $publicKey;
        $hash = hash_hmac('sha256', $payload, $secretKey, true);
        $hexHash = array_shift(unpack('H*', $hash));
        $signature = $payload . '.' . $hexHash;
        $tickerUrl = "http://apiv2.bitcoinaverage.com/indices/global/ticker/BTCCAD"; 
        $aHTTP = array(
          'http' =>
            array(
            'method'  => 'GET',
            )
        );
        $aHTTP['http']['header']  = "X-Signature: " . $signature;
        $context = stream_context_create($aHTTP);
        $content = file_get_contents($tickerUrl, false, $context);
        $cont = json_decode($content);
        $value = $cont->ask;
        $this->ExchangeRate->updateAll(array('ExchangeRate.exchange_money'=> $value),array('ExchangeRate.id'=>2));
        exit;
    }
  
    public function eur(){

    configure::write('debug', 0);
        $this->loadModel('ExchangeRate');  

        $secretKey = 'MWE1ODcwMmViNjIxNDNlNGI0YjM3NjdiNzEzY2M2OWYxNDRmYmU5NTIzMDQ0MWRlOTc4MTcxZjY2ODg3MjUxOQ';
        $publicKey = 'ODk0ODQzYjZjNzM0NGY3NTk0MWM2YjM0NWExMDllMTE';
        $timestamp = time();
        $payload = $timestamp . '.' . $publicKey;
        $hash = hash_hmac('sha256', $payload, $secretKey, true);
        $hexHash = array_shift(unpack('H*', $hash));
        $signature = $payload . '.' . $hexHash;
        $tickerUrl = "http://apiv2.bitcoinaverage.com/indices/global/ticker/BTCEUR"; 
        $aHTTP = array(
          'http' =>
            array(
            'method'  => 'GET',
            )
        );
        $aHTTP['http']['header']  = "X-Signature: " . $signature;
        $context = stream_context_create($aHTTP);
        $content = file_get_contents($tickerUrl, false, $context);
        $cont = json_decode($content);
        $value = $cont->ask;
        $this->ExchangeRate->updateAll(array('ExchangeRate.exchange_money'=> $value),array('ExchangeRate.id'=>3));
        exit;
    }

    public function aud(){

    configure::write('debug', 0);
        $this->loadModel('ExchangeRate');  

        $secretKey = 'MWE1ODcwMmViNjIxNDNlNGI0YjM3NjdiNzEzY2M2OWYxNDRmYmU5NTIzMDQ0MWRlOTc4MTcxZjY2ODg3MjUxOQ';
        $publicKey = 'ODk0ODQzYjZjNzM0NGY3NTk0MWM2YjM0NWExMDllMTE';
        $timestamp = time();
        $payload = $timestamp . '.' . $publicKey;
        $hash = hash_hmac('sha256', $payload, $secretKey, true);
        $hexHash = array_shift(unpack('H*', $hash));
        $signature = $payload . '.' . $hexHash;
        $tickerUrl = "http://apiv2.bitcoinaverage.com/indices/global/ticker/BTCAUD"; 
        $aHTTP = array(
          'http' =>
            array(
            'method'  => 'GET',
            )
        );
        $aHTTP['http']['header']  = "X-Signature: " . $signature;
        $context = stream_context_create($aHTTP);
        $content = file_get_contents($tickerUrl, false, $context);
        $cont = json_decode($content);
        $value = $cont->ask;
        $this->ExchangeRate->updateAll(array('ExchangeRate.exchange_money'=> $value),array('ExchangeRate.id'=>4));
        exit;
    }

    public function gbp(){

    configure::write('debug', 0);
        $this->loadModel('ExchangeRate');  

        $secretKey = 'MWE1ODcwMmViNjIxNDNlNGI0YjM3NjdiNzEzY2M2OWYxNDRmYmU5NTIzMDQ0MWRlOTc4MTcxZjY2ODg3MjUxOQ';
        $publicKey = 'ODk0ODQzYjZjNzM0NGY3NTk0MWM2YjM0NWExMDllMTE';
        $timestamp = time();
        $payload = $timestamp . '.' . $publicKey;
        $hash = hash_hmac('sha256', $payload, $secretKey, true);
        $hexHash = array_shift(unpack('H*', $hash));
        $signature = $payload . '.' . $hexHash;
        $tickerUrl = "http://apiv2.bitcoinaverage.com/indices/global/ticker/BTCGBP"; 
        $aHTTP = array(
          'http' =>
            array(
            'method'  => 'GET',
            )
        );
        $aHTTP['http']['header']  = "X-Signature: " . $signature;
        $context = stream_context_create($aHTTP);
        $content = file_get_contents($tickerUrl, false, $context);
        $cont = json_decode($content);
        $value = $cont->ask;
        $this->ExchangeRate->updateAll(array('ExchangeRate.exchange_money'=> $value),array('ExchangeRate.id'=>5));
        exit;
  }



}
