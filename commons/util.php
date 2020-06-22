<?php 
define('BASE_URL','http://localhost/Assignment/');
function dd($var){
    echo "<pre>";
    var_dump(($var));
    die;
}

function getPaginnateSize(){
    return [
        'defautl' => 20,
        'list' => [20,50,80,120]
    ];
}

function getClientURL($urlPath,$params = []){
    $url = BASE_URL . $urlPath;
    if(count($params)>0){
        $url .= "?";
        foreach ($params as $key => $value){
            $url .= "$key=$value&";
        }
        $url = rtrim($url, "&");
    }
    return $url;
}

function uploadImage($file, $fileLocation){
    if($file['size']>0){
        $filename = $fileLocation . '/' . uniqid() . '-' . $file['name'];
        if(move_uploaded_file($file['tmp_name'], './' . $filename)){
            return $filename;
        }
    }
    return null;
}

function getAssetUrl($assetUrl){
    return BASE_URL . 'public/' . $assetUrl;
}
?>