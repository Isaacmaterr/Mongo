<?php
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<HTML>
    <HEAD>


        <link href="../webroot/css/jquery.tagit.css" rel="stylesheet" type="text/css">
        <link href="../webroot/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD Mongodb</title>

    </head>
    <body>
        <div class="row">

        </div>
        <div class="row" style="margin-top: 58px;">

            <div id="main" class="container-fluid">
                <button class="btn btn-danger"  onClick="history.go(-1)">Voltar</button>
                <h3 class="page-header">Adicionar Livros</h3>


                <form action="cadastrarAction.php" method="post" enctype="multipart/form-data">


                    <div class="container-fluid">
                        <div class="row">
                            <div class=" col-md-5 center-block">
                                <input type="hidden" name="lat" id="lat" value="0" />
                                <input type="hidden" name="lng" id="lng" value="0" />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control"  name="nome" placeholder="nome">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Senha</label>
                                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Data de nacimento</label>
                                    <input type="text" class="form-control" name="data" placeholder="Data de Nacimento">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Imagem</label>
                                     <input type="file" name="file">
                                </div>
                                   <div class="form-group">
                                    <label for="exampleInputEmail1">Distancia maxima para buscar seus intereces </label>
                                     <input type="text" name="raio">
                                </div>
                                <label for="exampleInputEmail1">Marque aqui sua localização</label>
                                <div class="row">
                                    <div id="map-canvas" class="col-md-5" style="width: 100%; height:400px;padding-left: 17px;"/>
                                </div>
                                      <button type="submit" class="btn btn-default" name="cadastrar">Submit</button>
                            </div>

                        </div>


                    </div>


                </form>



            </div>


            <script src="../webroot/js/bootstrap.min.js"></script>
            <script src="../webroot/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
            <script>

                    var map;
                    var marker;

                    function initialize() {
                        var mapOptions = {
                            center: new google.maps.LatLng(-14.008696, -47.373047),
                            zoom: 4,
                            mapTypeId: 'roadmap'
                        };

                        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                        // Evento que detecta o click no mapa para criar o marcador
                        google.maps.event.addListener(map, "click", function (event) {

                            // O evento "click" retorna a posição do click no mapa,
                            // através dos métodos latLng.lat() e latLng.lng().

                            // Passamos as respectivas coordenadas para as variáveis lat e lng
                            // para posterior referência.
                            // Utilizamos o método toFixed(6) para limitar o número de casas decimais.
                            // A API ignora os valores além da 6ª casa decimal
                            var lat = event.latLng.lat().toFixed(6);
                            var lng = event.latLng.lng().toFixed(6);

                            // A criação do marcador é feita na função createMarker() e
                            // passamos os valores das coordenadas do click através
                            // dos parâmetros lat e lng.
                            createMarker(lat, lng);

                            // getCoords() actualiza os valores de Latitue e Longitude
                            // das caixas de texto existentes no topo da página
                            getCoords(lat, lng);

                        });


                    }
                    google.maps.event.addDomListener(window, 'load', initialize);

                    // Função que cria o marcador
                    function createMarker(lat, lng) {

                        // A intenção é criar um único marcador, por isso
                        // verificamos se já existe um marcador no mapa.
                        // Assim cada vez que é feito um click no mapa
                        // o anterior marcador é removido e é criado outro novo.

                        // Se a variável marker contém algum valor
                        if (marker) {
                            // remover esse marcador do mapa
                            marker.setMap(null);
                            // remover qualquer valor da variável marker
                            marker = "";
                        }

                        // definir a variável marker com os novos valores
                        marker = new google.maps.Marker({
                            // Define a posição do marcador através dos valores lat e lng
                            // que foram definidos através do click no mapa
                            position: new google.maps.LatLng(lat, lng),
                            // Esta opção permite que o marcador possa ser arrastado
                            // para um posicionamento com maior precisão.
                            draggable: true,
                            map: map
                        });


                        // Evento que detecta o arrastar do marcador para
                        // redefinir as coordenadas lat e lng e
                        // actualiza os valores das caixas de texto no topo da página
                        google.maps.event.addListener(marker, 'dragend', function () {

                            // Actualiza as coordenadas de posição do marcador no mapa
                            marker.position = marker.getPosition();

                            // Redefine as variáveis lat e lng para actualizar
                            // os valores das caixas de texto no topo
                            var lat = marker.position.lat().toFixed(6);
                            var lng = marker.position.lng().toFixed(6);

                            // Chamada da função que actualiza os valores das caixas de texto
                            getCoords(lat, lng);

                        });
                    }

                    // Função que actualiza as caixas de texto no topo da página
                    function getCoords(lat, lng) {

                        // Referência ao elemento HTML (input) com o id 'lat'
                        var coords_lat = document.getElementById('lat');

                        // Actualiza o valor do input 'lat'
                        coords_lat.value = lat;

                        // Referência ao elemento HTML (input) com o id 'lng'
                        var coords_lng = document.getElementById('lng');

                        // Actualiza o valor do input 'lng'
                        coords_lng.value = lng;
                    }

            </script>

    </BODY>
</HTML>
