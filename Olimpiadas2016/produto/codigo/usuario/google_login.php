<?php 
include_once("../src/Google_Client.php");
include_once("../src/contrib/Google_Oauth2Service.php");

$redirectUrl = 'http://localhost/Olimpiadas2016/produto/codigo/usuario/login.php'; 
$baseUrl = 'http://localhost/Olimpiadas2016/produto/codigo/';

$gClient = new Google_Client();
$gClient->setApplicationName('Olímpiadas 2016');
$gClient->setClientId('895645750815-3ajucdmc9ei6hl3tbq9rs74h0k8vuo5u.apps.googleusercontent.com');
$gClient->setClientSecret('DHRNqQ8ZxSyUj_tQEf0afR0b');
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);


if(isset($_REQUEST['code'])){
    $gClient->authenticate();
    $_SESSION['token'] = $gClient->getAccessToken();
    header("Location: " . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    $userProfile = $google_oauthV2->userinfo->get();
    $_SESSION['login'] = $userProfile['email'];

    header("Location: " . $baseUrl);
    $_SESSION['token'] = $gClient->getAccessToken();
} else {
    $authUrl = $gClient->createAuthUrl();
} ?>