<?php include 'callApi.php' ?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8"/>
        <title>Listando produtos</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php listaProdutos();  ?>
            </div>
        </div>
    </body>
</html>
<style>
img{max-width:100%;}
	*{transition: all .5s ease;-moz-transition: all .5s ease;-webkit-transition: all .5s ease}
.my-list {
    width: 100%;
    padding: 10px;
    border: 1px solid #f5efef;
    float: left;
    margin: 15px 0;
    border-radius: 5px;
    box-shadow: 2px 3px 0px #e4d8d8;
    position:relative;
    overflow:hidden;
}
.my-list h3{
    text-align: left;
    font-size: 14px;
    font-weight: 500;
    line-height: 21px;
    margin: 0px;
    padding: 0px;
    border-bottom: 1px solid #ccc4c4;
    margin-bottom: 5px;
    padding-bottom: 5px;
}
.my-list span{
    float:left;
    font-weight: bold;
}
.my-list span:last-child{
    float:right;
}
.my-list .offer{
    width: 100%;
    float: left;
    margin: 5px 0;
    border-top: 1px solid #ccc4c4;
    margin-top: 5px;
    padding-top: 5px;
    color: #afadad;
}
.detail {
    position: absolute;
    top: -100%;
    left: 0;
    text-align: center;
    background: #fff;
    height: 100%;
    width:100%;
}

.my-list:hover .detail{
    top:0;
}
</style>