<?php

function index() {
    require_once "callApi.php";
    require_once "listProducts.php";

    $authorization = getTokenIrroba('{{api_user_irroba}}','{{api_password_irroba}}');

    if($authorization['httpcode'] == 200 && (bool)$authorization['success']) {
        $token_irroba = $authorization['data']['authorization'];
    } else {
        echo error('Credenciais', 'Erro ao gerar as credenciais na API, verifique o usuario e senha!');
        die();
    }

    $products = callIrroba($token_irroba, 'product?limit=12');

    if($products['httpcode'] == 200 && (bool)$products['success']) {
        $products = $products['data'];
    } else {
        echo error('Produtos', 'Erro ao buscar os produtos na Irroba');
        die();
    }

    echo listHtml($products);
    die();

}


function error($error, $text){

    echo '<!DOCTYPE html> <html lang="en"> <head> <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <title>404 HTML Template by Colorlib</title> <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet"> <link href="https://fonts.googleapis.com/css?family=Chango" rel="stylesheet"> <link type="text/css" rel="stylesheet" href="css/style.css"/><!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--> </head> <body> <div id="notfound"> <div class="notfound"> <div> <div class="notfound-404"> <h1>!</h1> </div><h2>'; echo $error; echo '<br>404</h2> </div><p>'; echo $text; echo '<a href="#">Verifique</a></p></div></div><script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="818f9c78032f46c4dde52397-text/javascript"></script> <script type="818f9c78032f46c4dde52397-text/javascript"> window.dataLayer=window.dataLayer || []; function gtag(){dataLayer.push(arguments);}gtag("js", new Date()); gtag("config", "UA-23581568-13"); </script> <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="818f9c78032f46c4dde52397-|49" defer=""></script></body> </html> <style>*{-webkit-box-sizing: border-box; box-sizing: border-box;}body{padding: 0; margin: 0;}#notfound{position: relative; height: 100vh;}#notfound .notfound{position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);}.notfound{max-width: 520px; width: 100%; line-height: 1.4;}.notfound>div:first-child{padding-left: 200px; padding-top: 12px; height: 170px; margin-bottom: 20px;}.notfound .notfound-404{position: absolute; left: 0; top: 0; width: 170px; height: 170px; background: #e01818; border-radius: 7px; -webkit-box-shadow: 0px 0px 0px 10px #e01818 inset, 0px 0px 0px 20px #fff inset; box-shadow: 0px 0px 0px 10px #e01818 inset, 0px 0px 0px 20px #fff inset;}.notfound .notfound-404 h1{font-family: "Chango", cursive; color: #fff; font-size: 118px; margin: 0px; position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%); display: inline-block; height: 60px; line-height: 60px;}.notfound h2{font-family: "Chango", cursive; font-size: 68px; color: #222; font-weight: 400; text-transform: uppercase; margin: 0px; line-height: 1.1;}.notfound p{font-family: "Montserrat", sans-serif; font-size: 16px; font-weight: 400; color: #222; margin-top: 5px;}.notfound a{font-family: "Montserrat", sans-serif; color: #e01818; font-weight: 400; text-decoration: none;}@media only screen and (max-width: 480px){.notfound{padding-left: 15px; padding-right: 15px;}.notfound>div:first-child{padding: 0px; height: auto;}.notfound .notfound-404{position: relative; margin-bottom: 15px;}.notfound h2{font-size: 42px;}}</style>';
}

index();