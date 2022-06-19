<?php

class Util {

    static public function data_br($data, $mask = 'd/m/Y') {
        return date($mask, strtotime($data));
    }

    static public function link($obj) {
        return Router::base() . "/index/ler/" . $obj->paciente_id . "/" . Util::slug($obj->local_nome) . "/" . Util::slug($obj->paciente_nome) . "/";
    }

    static public function to_double($v) {
        return preg_replace(array('/\,/', '/\./'), array('', ''), $v);
    }

    static public function money($v) {
        return number_format(substr($v, 0, -2), 2, ',', '.');
    }

    static public function slug($str, $ret = null, $sep = '-') {

        $array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô",
            "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í",
            "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç");
        $array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o",
            "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I",
            "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C");
        $str = str_replace($array1, $array2, $str);

        $str = strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array("$sep", "$sep", ''), $str));
        $parts = explode(" ", $str);
        $part = $parts[0];
        if (isset($parts[1])) {
            $part .= " " . $parts[1];
        }
        if (isset($parts[2]) && count($parts) >= 4) {
            $part .= " " . $parts[2];
        }
        if ($ret != null)
            return $part;
        else
            return $str;
    }

    static public function printr($array) {
        echo '<pre>';
        print_r($array);
        exit;
    }

    static public function protecao($a, $b, $str) {
        return preg_replace($a, $b, $str);
    }

    static public function parse_str($str) {
        return addslashes($str);
    }

    static public function cut($str, $chars, $info) {
        if (strlen($str) >= $chars) {
            $str = preg_replace('/\s\s+/', ' ', $str);
            $str = strip_tags($str);
            $str = preg_replace('/\s\s+/', ' ', $str);
            $str = substr($str, 0, $chars);
            $str = preg_replace('/\s\s+/', ' ', $str);
            $arr = explode(' ', $str);
            array_pop($arr);
            $final = implode(' ', $arr) . $info;
        } else {
            $final = $str;
        }
        return $final;
    }

    static public function link_externo($str) {
        if ($str != "") {
            $s = "http://www.";
            if (preg_match('/https\:\/\//', $str)) {
                $s = "https://";
            }
            $str = preg_replace(array('/www\./', '/http\:\/\//', '/https\:\/\//'), array('', '', ''), $str);
            return $s . $str;
        } else {
            return $str;
        }
    }

    static public function getLatLon($address) {
        $address = urlencode(utf8_encode($address));
        $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Brazil";
        //$json = file_get_contents($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        $json = json_decode($json);
        if (isset($json->status) && $json->status == "OK") {
            $lat = $json->results[0]->geometry->location->lat;
            $lon = $json->results[0]->geometry->location->lng;
            return (object) array('lat' => $lat, 'lon' => $lon);
        } else {
            return (object) array('lat' => '', 'lon' => '');
        }
    }

}
