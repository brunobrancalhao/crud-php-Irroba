<?php

function listProdutos($products) {
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

function listHtml($products){
    echo '<!DOCTYPE html><html lang="pt"> <head> <meta charset="utf-8"/> <title>Listando produtos</title> <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> </head> <body> <div class="container"> <div class="row">';
    echo listProdutos($products);
    echo '</div></div></body></html><style>img{max-width:100%;}*{transition: all .5s ease;-moz-transition: all .5s ease;-webkit-transition: all .5s ease}.my-list{width: 100%; padding: 10px; border: 1px solid #f5efef; float: left; margin: 15px 0; border-radius: 5px; box-shadow: 2px 3px 0px #e4d8d8; position:relative; overflow:hidden;}.my-list h3{text-align: left; font-size: 14px; font-weight: 500; line-height: 21px; margin: 0px; padding: 0px; border-bottom: 1px solid #ccc4c4; margin-bottom: 5px; padding-bottom: 5px;}.my-list span{float:left; font-weight: bold;}.my-list span:last-child{float:right;}.my-list .offer{width: 100%; float: left; margin: 5px 0; border-top: 1px solid #ccc4c4; margin-top: 5px; padding-top: 5px; color: #afadad;}.detail{position: absolute; top: -100%; left: 0; text-align: center; background: #fff; height: 100%; width:100%;}.my-list:hover .detail{top:0;}';
}