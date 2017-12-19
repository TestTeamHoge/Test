<?php
// JSON形式への安全なエンコード
function json_safe_encode($data){
    return json_encode($data,JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT);
}
// JSON形式への安全なデコード(UTF-8形式にする)
function json_safe_decode($data){
    $mb_convert = mb_convert_encoding($data,"UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS");
    return json_decode($mb_convert);
}

$json_url = './src/hoge.json';
if(file_exists($json_url)){
    $json = file_get_contents($json_url);
    if($json==false){
        throw new \RuntimeException('file not found');
    }
    $data = json_safe_decode($json);
    print_r($data);
}
?>