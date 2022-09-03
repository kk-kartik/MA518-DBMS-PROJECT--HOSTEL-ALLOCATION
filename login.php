<?php 
function httpPost($url, $data){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    echo $response;
}
if(isset($_POST['submit'])){
    if($_POST['username']==$_POST['password']){
        header("Location: main.php?id={$_POST['username']}");
    }else if($_POST['username']=="admin"){
        $data=['error'=>'Invalid'];
        httpPost("index.php",$data);
    }else{
        header("Location: index.php?error=INVALID PASSWORD");
    }
}else{
    header("Location: index.php");
}