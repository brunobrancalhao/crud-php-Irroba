<?php

function listaProdutos() {

    $url = '';

    $response = file_get_contents('http://8d50a84ed604.ngrok.io/products');

    $products = json_decode($response, true);

    if($products) {
        foreach ($products as $product) {
            echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
            echo '<div class="my-list">';
            echo        '<img src="'.$product['image'].'" alt="dsadas" />';
            echo        '<h3>'.$product['title'].'</h3>';
            echo       '<span>RS:'.$product['price'].'</span>';
            echo        '<span class="pull-right"></span>';
            echo        '<div class="offer"></div>';
            echo        '<div class="detail">';
            echo        '<p>'.$product['title'].'</p>';
            echo        '<img src="'.$product['image'].'" alt="dsadas" />';
            echo       '<a href="#" class="btn btn-info">Carrinho</a>';
            echo       '<a href="#" class="btn btn-info">Detalhes</a>';
            echo    '</div>';
            echo  '</div>';
            echo  '</div>';
        }
    } else {
        die('A API NÃO RETORNOU NENHUM PRODUTO');
    }
}
?>