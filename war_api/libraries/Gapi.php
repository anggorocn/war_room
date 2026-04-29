<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once("functions/string.func.php");
include_once("functions/encrypt.func.php");

class Gapi
{
	function getpbrkinerja($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlpbrkinerja"]."".$arrparam["vurl"];
        // print_r($url);exit;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'xxx');
        
        $response= curl_exec($ch);
        // print_r($response);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function getcodex($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlcodex"]."".$arrparam["vurl"];
        // print_r($url);exit;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response= curl_exec($ch);
        // print_r($response);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function getDashboardProject($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlDashboardProjectAPI"]."".$arrparam["vurl"];

        if($arrparam["cekquery"] == "url")
        {
            echo $url;exit;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response= curl_exec($ch);
        // print_r($response);exit;
        // print_r($url);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function getPbrBackend($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlPbrBackend"]."".$arrparam["vurl"];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');

        $response= curl_exec($ch);
        // print_r($response);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function getDashboardPLNNP($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlPLNNP"]."".$arrparam["vurl"];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');
        $response= curl_exec($ch);
        // print_r($response);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function getDashboardCdn($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlCdn"]."".$arrparam["vurl"];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');
        $response= curl_exec($ch);
        // print_r($response);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }


    function getBdd($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlbdd"]."".$arrparam["vurl"];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');
        $response= curl_exec($ch);
        // print_r($response);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function getBdg($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlbdg"]."".$arrparam["vurl"];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');
        $response= curl_exec($ch);
        // print_r($response);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }


    function getstatic($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlstatic"]."".$arrparam["vurl"];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');
        $response= curl_exec($ch);
        // print_r($response);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function gethighlight($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["urlhighlight"]."".$arrparam["vurl"];
        // echo $url;exit;

         $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');
        $response= curl_exec($ch);
        // print_r($url);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function getBppNac($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["bpp_nac"]."".$arrparam["vurl"];
        // echo $url;exit;

         $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');
        $response= curl_exec($ch);
        // print_r($url);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function getHppvsbpp($arrparam)
    {
        $ci=& get_instance();
        $url= $ci->config->config["hppvsbpp"]."".$arrparam["vurl"];
        // echo $url;exit;

         $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');
        $response= curl_exec($ch);
        // print_r($url);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;
    }

    function getEtlDashboardDitop($arrparam)
    {
        $ci=& get_instance();

        $infourl= "";
        $infourl= $ci->config->config["etl-dashboard-ditop"];
        $url= $infourl."".$arrparam["vurl"];
        // echo $url;exit;

         $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36');
        $response= curl_exec($ch);
        // print_r($url);exit;
        $rs= json_decode($response);
        curl_close($ch);
        // print_r($rs);exit;

        return $rs;

    }

	function enkripdekripkunci()
	{
		return "KuNc1";
	}

	function enkripdata($arrparam)
	{
		$reqdata= urldecode($arrparam["reqdata"]);
		$reqkunci= urldecode($arrparam["reqkunci"]);

		return mencrypt($reqdata, $reqkunci);
	}

	function dekripdata($arrparam)
	{
		$reqdata= urldecode($arrparam["reqdata"]);
		$reqkunci= urldecode($arrparam["reqkunci"]);

		return mdecrypt($reqdata, $reqkunci);
	}

}