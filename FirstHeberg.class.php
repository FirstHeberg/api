<?php

class FirstHeberg
{

    private $login;
    private $token;
    private $debug = false;

    function __construct($login = null, $token = null, $debug = false)
    {

        $this->login = $login;
        $this->token = $token;
        $this->debug = $debug;

    }

    public function get($route, $datas = array())
    {

        $result = $this->curl($route, $datas, 'get');

        return $result ? json_decode($result, true) : false;

    }

    public function post($route, $datas = array())
    {

        $result = $this->curl($route, $datas, 'post');

        return $result ? json_decode($result, true) : false;

    }

    private function curl($route, $datas = array(), $method = 'get')
    {

        $headers = ['TOKEN: ' . $this->token, 'LOGIN: ' . $this->login];

        $url = 'https://api.firstheberg.com' . $route;

        $ch = curl_init();

        if ($this->debug)
        {
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        }

        curl_setopt($ch, CURLOPT_URL, $url);

        if ($method === 'post')
        {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
        }
        elseif ($method === 'get' and count($datas) > 0)
        {
            $url .= '?' . http_build_query($datas);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if ($result === false)
        {
            if ($this->debug)
            {
                echo 'Curl Error:' . curl_error($ch);
            }

            $result = false;
        }
        else
        {
            if ($this->debug)
            {
                echo PHP_EOL;
                echo 'Request:' . PHP_EOL;
                echo curl_getinfo($ch, CURLINFO_HEADER_OUT);
                echo PHP_EOL;

                echo 'Response:' . PHP_EOL;
                echo $result;
                echo PHP_EOL;
            }
        }

        curl_close($ch);
        return $result;

    }

}
