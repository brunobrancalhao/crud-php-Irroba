# Instruções de como consumir a API da Irroba
# Realizar checkout na nova branch
 ```sh
git checkout -b consumer-api-irroba
 ```

Criar um primeiro arquivo dentro da pasta src com o nome de callApi.php
src/callApi.php

Após isso vamos criar a primeira função callIrroba que sera responsavel por realizar as chamadas na API da Irroba
 ```
     function callIrroba($authorization, $apiContext, $data = [], $method = 'GET') {

        $url = 'https://api.irroba.com.br/v1/' . $apiContext;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        if($method == 'POST') {
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_POST, count($data));
        }

        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_FORBID_REUSE, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization:".$authorization));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($curl);
        $httpcode['httpcode'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $result = json_decode($response, true);
        return array_merge($httpcode, $result);
    }
  ```

E a segunda função getTokenIrroba que sera responsavel por buscar o token da loja na API
 ```
    function getTokenIrroba($user, $password) {
        $data = array(
            'username' => $user,
            'password' => $password
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_POST, count($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, 'https://api.irroba.com.br/v1/getToken');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($curl);
        $httpcode['httpcode'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $result = json_decode($response, true);
        return array_merge($httpcode, $result);
    }
  ```
  Logo após vamos iniciar a criação da nossa index.php
  Primeiro vamos criar uma função com o nome de erro
   ```
    function error($error, $text){
        echo '<!DOCTYPE html> <html lang="en"> <head> <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <title>404 HTML Template by Colorlib</title> <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet"> <link href="https://fonts.googleapis.com/css?family=Chango" rel="stylesheet"> <link type="text/css" rel="stylesheet" href="css/style.css"/><!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--> </head> <body> <div id="notfound"> <div class="notfound"> <div> <div class="notfound-404"> <h1>!</h1> </div><h2>'; echo $error; echo '<br>404</h2> </div><p>'; echo $text; echo '<a href="#">Verifique</a></p></div></div><script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="818f9c78032f46c4dde52397-text/javascript"></script> <script type="818f9c78032f46c4dde52397-text/javascript"> window.dataLayer=window.dataLayer || []; function gtag(){dataLayer.push(arguments);}gtag("js", new Date()); gtag("config", "UA-23581568-13"); </script> <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="818f9c78032f46c4dde52397-|49" defer=""></script></body> </html> <style>*{-webkit-box-sizing: border-box; box-sizing: border-box;}body{padding: 0; margin: 0;}#notfound{position: relative; height: 100vh;}#notfound .notfound{position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);}.notfound{max-width: 520px; width: 100%; line-height: 1.4;}.notfound>div:first-child{padding-left: 200px; padding-top: 12px; height: 170px; margin-bottom: 20px;}.notfound .notfound-404{position: absolute; left: 0; top: 0; width: 170px; height: 170px; background: #e01818; border-radius: 7px; -webkit-box-shadow: 0px 0px 0px 10px #e01818 inset, 0px 0px 0px 20px #fff inset; box-shadow: 0px 0px 0px 10px #e01818 inset, 0px 0px 0px 20px #fff inset;}.notfound .notfound-404 h1{font-family: "Chango", cursive; color: #fff; font-size: 118px; margin: 0px; position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%); display: inline-block; height: 60px; line-height: 60px;}.notfound h2{font-family: "Chango", cursive; font-size: 68px; color: #222; font-weight: 400; text-transform: uppercase; margin: 0px; line-height: 1.1;}.notfound p{font-family: "Montserrat", sans-serif; font-size: 16px; font-weight: 400; color: #222; margin-top: 5px;}.notfound a{font-family: "Montserrat", sans-serif; color: #e01818; font-weight: 400; text-decoration: none;}@media only screen and (max-width: 480px){.notfound{padding-left: 15px; padding-right: 15px;}.notfound>div:first-child{padding: 0px; height: auto;}.notfound .notfound-404{position: relative; margin-bottom: 15px;}.notfound h2{font-size: 42px;}}</style>';
    }
  ```

  E então iniciar a criação da nossa função index
     ```
        function index() {

        require_once "callApi.php";
        require_once "listProducts.php";

        $authorization = getTokenIrroba('lojademo_testeint', 'aNWJwtGHNwJli7OGmaeWNQbnKyiEbQKaXDgIp52');

        if($authorization['httpcode'] == 200 && (bool)$authorization['success']) {
            $token_irroba = $authorization['data']['authorization'];
        } else {
            echo error('Credenciais','Erro ao gerar credenciais da API verifique o usuario e senha');
            die();
        }

        $products = callIrroba($token_irroba, 'product?limit=10');

        if($authorization['httpcode'] == 200 && (bool)$authorization['success']) {
            $products = $products['data'];
        } else {
            echo error('Produtos','Erro ao buscar os produtos na Irroba');
            die();
        }

        echo listHtml($products);

        die();
    }
  ```


  logo após precisamos criar um arquivo para listar os produtos com o nome de listProducts.php

  Primeiro a função listHtml

       ```
        function listHtml($products){
            echo '<!DOCTYPE html><html lang="pt"> <head> <meta charset="utf-8"/> <title>Listando produtos</title> <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> </head> <body> <div class="container"> <div class="row">';
            echo listProdutos($products);
            echo '</div></div></body></html><style>img{max-width:100%;}*{transition: all .5s ease;-moz-transition: all .5s ease;-webkit-transition: all .5s ease}.my-list{width: 100%; padding: 10px; border: 1px solid #f5efef; float: left; margin: 15px 0; border-radius: 5px; box-shadow: 2px 3px 0px #e4d8d8; position:relative; overflow:hidden;}.my-list h3{text-align: left; font-size: 14px; font-weight: 500; line-height: 21px; margin: 0px; padding: 0px; border-bottom: 1px solid #ccc4c4; margin-bottom: 5px; padding-bottom: 5px;}.my-list span{float:left; font-weight: bold;}.my-list span:last-child{float:right;}.my-list .offer{width: 100%; float: left; margin: 5px 0; border-top: 1px solid #ccc4c4; margin-top: 5px; padding-top: 5px; color: #afadad;}.detail{position: absolute; top: -100%; left: 0; text-align: center; background: #fff; height: 100%; width:100%;}.my-list:hover .detail{top:0;}';
        }
  ```

  Logo após a função listProdutos
  ```
    function  listProdutos($products){
        if($products) {
            foreach ($products as $product) {
                echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
                echo '<div class="my-list">';
                echo        '<img src="'.$product['image'].'" alt="dsadas" />';
                echo        '<h3>'.$product['product_description'][0]['name'].'</h3>';
                echo       '<span>R$: '.$product['price_sale'].'</span>';
                echo        '<span class="pull-right"></span>';
                echo        '<div class="offer"></div>';
                echo        '<div class="detail">';
                echo        '<p>'.$product['product_description'][0]['name'].'</p>';
                echo        '<img src="'.$product['image'].'" alt="dsadas" />';
                echo       '<a class="btn btn-info">Carrinho</a>';
                echo       '<a target="_blank" href="https://lojademo.irroba.com.br/busca?search='.$product['model'].'" class="btn btn-info">Detalhes</a>';
                echo    '</div>';
                echo  '</div>';
                echo  '</div>';
            }
        }
    }
  ```