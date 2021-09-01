<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="webroot/css/bootstrap.min.css" rel="stylesheet">
    <link href="webroot/lib/leaflet/leaflet.css" rel="stylesheet">
    <link href="webroot/lib/fork-awesome/css/fork-awesome.min.css" rel="stylesheet">
    <link href="webroot/lib/leaflet-sidebar-v2/css/leaflet-sidebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
    <style>
        html, body {
            margin:0 !important;
            padding: 0 !important;
        }

        #map{
            width:100% !important;
            height:100% !important;
            position:absolute !important;
        }

        #convert {
            position: fixed;
            right: 0;
            bottom: 0;
            margin: 0 1em 3em 0;
            z-index: 400;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
        .btn-circle.btn-lg {
            width: 50px;
            height: 50px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.33;
            border-radius: 25px;
        }
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            font-size: 24px;
            line-height: 1.33;
            border-radius: 35px;
        }
    </style>
</head>
<body>
<div id="sidebar" class="leaflet-sidebar collapsed">
    <!-- Tabs categorias -->
    <div class="leaflet-sidebar-tabs">
        <ul role="tablist" id="tabSidebar"></ul>
    </div>
    <div class="leaflet-sidebar-content" id="contentSidebar">
    </div>
</div>
<div id="map"></div>
<!--<button id="convert" type="button">
    Get all features to GeoJSON string
</button>-->
<!--<button type="button" class="btn btn-success btn-circle btn-lg" id="convert">
    <i class="fa fa-floppy-o"></i>
</button>-->
<div class="modal" id="attributes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Attribute Data</h4>
            </div>
            <div class="modal-body" id="body_attribute"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnSaveGeometry">
                    <i class="fa fa-floppy-o"></i>
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="webroot/js/popper.min.js"></script>
<script src="webroot/js/bootstrap.min.js"></script>
<script src="webroot/lib/leaflet/leaflet.js"></script>
<script src="webroot/lib/mustache/mustache.min.js"></script>
<script src="webroot/lib/leaflet-sidebar-v2/js/leaflet-sidebar.min.js"></script>
<script src="webroot/lib/geojson/geojson.min.js"></script>
<script id="template" type="x-tmpl-mustache">
        <form action="" id="formGeometry">
            <input type="hidden" name="uuid" id="uuid" value="{{ uuid }}">
            <div class="col-xs-2">
                <label for="name">Nombre</label>
                <input class="form-control" name="name" id="name"  type="text" value="{{ name }}">
            </div>
        </form>
    </script>
<script>

    (function($){
        $.fn.serializeObject = function(){

            var self = this,
                json = {},
                push_counters = {},
                patterns = {
                    "validate": /^[a-zA-Z][a-zA-Z0-9_]*(?:\[(?:\d*|[a-zA-Z0-9_]+)\])*$/,
                    "key":      /[a-zA-Z0-9_]+|(?=\[\])/g,
                    "push":     /^$/,
                    "fixed":    /^\d+$/,
                    "named":    /^[a-zA-Z0-9_]+$/
                };


            this.build = function(base, key, value){
                base[key] = value;
                return base;
            };

            this.push_counter = function(key){
                if(push_counters[key] === undefined){
                    push_counters[key] = 0;
                }
                return push_counters[key]++;
            };

            $.each($(this).serializeArray(), function(){

                // Skip invalid keys
                if(!patterns.validate.test(this.name)){
                    return;
                }

                var k,
                    keys = this.name.match(patterns.key),
                    merge = this.value,
                    reverse_key = this.name;

                while((k = keys.pop()) !== undefined){

                    // Adjust reverse_key
                    reverse_key = reverse_key.replace(new RegExp("\\[" + k + "\\]$"), '');

                    // Push
                    if(k.match(patterns.push)){
                        merge = self.build([], self.push_counter(reverse_key), merge);
                    }

                    // Fixed
                    else if(k.match(patterns.fixed)){
                        merge = self.build([], k, merge);
                    }

                    // Named
                    else if(k.match(patterns.named)){
                        merge = self.build({}, k, merge);
                    }
                }

                json = $.extend(true, json, merge);
            });

            return json;
        };
    })(jQuery);

    function uuid() {
        function randomDigit() {
            if (crypto && crypto.getRandomValues) {
                var rands = new Uint8Array(1);
                crypto.getRandomValues(rands);
                return (rands[0] % 16).toString(16);
            } else {
                return ((Math.random() * 16) | 0).toString(16);
            }
        }

        var crypto = window.crypto || window.msCrypto;
        return 'xxxxxxxx-xxxx-4xxx-8xxx-xxxxxxxxxxxx'.replace(/x/g, randomDigit);
    }

    function addPopup(layer) {
        /*var content = document.getElementById('action');
        layer.feature.properties.action = content;*/

        /* content.addEventListener("keyup", function () {
                layer.feature.properties.action = content;
            });*/

        /*    layer.on("popupopen", function () {
                content.value = layer.feature.properties.desc;
              content.focus();
            });
            layer.bindPopup(content).openPopup();*/

        layer.on('dblclick', function() {

            $('#body_attribute').html('');

            var template = document.getElementById('template').innerHTML;

            layer.feature.properties.uuid = layer.feature.id;

            var rendered = Mustache.render(template, layer.feature.properties);

            $('#body_attribute').html(rendered);

            $('#attributes').modal({'show' : true, backdrop:'static', keyboard:false});
        });

    }

</script>
<script>

    $(document).ready(function () {

        var defaultLayer;
        var baseMaps = {},
            overlayMaps = {};

        const folder_gis = 'webroot/gis/';

        const layersReponse = {
            "layers": [
                {
                    "title_layer": "alimentadoras_ruta_3",
                    "url": `${folder_gis}hechos_de_transito_enero_2021.geojson`,
                    "transparent": true,
                    "base_map": false,
                    "default": true,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "alimentadoras_ruta_5.geojson",
                    "url":folder_gis+'alimentadoras_ruta_5.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "hechos_de_transito_enero_2021.geojson",
                    "url":folder_gis+'hechos_de_transito_enero_2021.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "hechos_de_transito_febrero_2021.geojson",
                    "url":folder_gis+'hechos_de_transito_febrero_2021.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "hechos_de_transito_marzo_2021.geojson",
                    "url":folder_gis+'hechos_de_transito_marzo_2021.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "incidentes_agosto_2020.geojson",
                    "url":folder_gis+'incidentes_agosto_2020.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "Incidentes_julio_2020.geojson",
                    "url":folder_gis+'Incidentes_julio_2020.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "incidentes_junio_2020.geojson",
                    "url":folder_gis+'incidentes_junio_2020.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "incidentes_mayo_2020.geojson",
                    "url":folder_gis+'incidentes_mayo_2020.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "incidentes_octubre_2020.geojson",
                    "url":folder_gis+'incidentes_octubre_2020.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "incidentes_viales_2019_3.geojson",
                    "url":folder_gis+'incidentes_viales_2019_3.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "Incidentes_viales_enero_2020.geojson",
                    "url":folder_gis+'Incidentes_viales_enero_2020.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "incidentes_viales_febrero_2020.geojson",
                    "url":folder_gis+'incidentes_viales_febrero_2020.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "infraciclista_2020.geojson",
                    "url":folder_gis+'infraciclista_2020.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "infraciclista_2021.geojson",
                    "url":folder_gis+'infraciclista_2021.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "lineas_ruta_1.geojson",
                    "url":folder_gis+'lineas_ruta_1.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "lineas_ruta_2.geojson",
                    "url":folder_gis+'lineas_ruta_2.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "origen_destino_19.geojson",
                    "url":folder_gis+'origen_destino_19.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "paraderos_ruta_1.geojson",
                    "url":folder_gis+'paraderos_ruta_1.geojson',
                    "transparent": true,
                    "base_map": false,
                    "default": false,
                    "id": 1,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                },
                {
                    "title_layer": "Mapa Base OSM",
                    "url": "https://ows.terrestris.de/osm/service",
                    "name_layer": "OSM-WMS",
                    "format": "image/png",
                    "transparent": true,
                    "base_map": true,
                    "default": true,
                    "id": 6,
                    "category": 1,
                    "legend": true,
                    "view_panel": true,
                    "type": "wms"
                }
            ]
        };

        const layers = [
            '',
            'alimentadoras_ruta_5.geojson',
            'hechos_de_transito_enero_2021.geojson',
            'hechos_de_transito_febrero_2021.geojson',
            'hechos_de_transito_marzo_2021.geojson',
            'incidentes_agosto_2020.geojson',
            'Incidentes_julio_2020.geojson',
            'incidentes_junio_2020.geojson',
            'incidentes_mayo_2020.geojson',
            'incidentes_octubre_2020.geojson',
            'incidentes_viales_2019_3.geojson',
            'Incidentes_viales_enero_2020.geojson',
            'incidentes_viales_febrero_2020.geojson',
            'infraciclista_2020.geojson',
            'infraciclista_2021.geojson',
            'lineas_ruta_1.geojson',
            'lineas_ruta_2.geojson',
            'origen_destino_19.geojson',
            'paraderos_ruta_1.geojson'
        ];

        const tabSidebarGen = (categories)=>{
            let html = ``;
            for (const category of categories) {
                html += `<li><a href="#tab-${category.id}" role="tab"><i class="fa ${category.icon}"></i></a></li>`;
            }
            return html;
        }

        const contentTabSidebarGen = (categories,layers)=>{
            let html = ``;

            for (const category of categories) {
                html += `<div class="leaflet-sidebar-pane" id="tab-${category.id}">
                        <h1 class="leaflet-sidebar-header">
                            ${category.name}
                            <span class="leaflet-sidebar-close">
                                <i class="fa fa-caret-right"></i>
                            </span>
                        </h1>
                            <div id="cat-${category.id}">
                                <strong class="title-layer p-2 pt-5">${category.name}</strong>
                                <div class="list-group list-group-flush">`;
                for (const layer of layers) {
                    if (layer.category == category.id && layer.view_panel ) {
                        html += `<div class="list-group-item">
                                                    <div class="form-check form-switch">
                                                    <input class="form-check-input check-layer" layer-base="${layer.base_map}" layer-name="${layer.title_layer}" type="checkbox" id="lay-${layer.id}"`;
                        if (layer.default) {
                            html += `checked>`;
                        } else {
                            html += `>`;
                        }
                        html += `<label class="form-check-label" for="flexSwitchCheckDefault">${layer.title_layer}</label></div></div>`;

                    }
                }
                html +=        `</div>
                            </div>
                        </div>`;
            }
            return html;
        }

        const categoriesResponse = {
            "categories": [
                {
                    "id": "1",
                    "name": "Mapa Base",
                    "icon": "fa-map"
                }
            ]
        };

        const loadfile = (url) => {
            return  $.ajax({
                url: url,
                method:'GET',
                async: false,
                dataType:'json',
                data:{},
                beforeSend:function () {

                },
                success: function (data) {
                   console.log(data);
                },
                complete:function () {

                }
            }).responseJSON;
        }

        layersReponse["layers"].forEach(function (layer) {
            var _layer;
            var _title = layer.title_layer;
            if (layer.base_map) {
                //La capa es base
                _layer = L.tileLayer.wms(
                    layer.url,
                    {
                        layers: layer.name_layer,
                        format: layer.format,
                        transparent: layer.transparent,
                    }
                );
                baseMaps[_title] = _layer;
            } else {

                _layer = L.geoJSON(loadfile(layer.url), {

                });

                console.log(_layer);
                overlayMaps[_title] = _layer;
            }
        });

        $('#tabSidebar').html( tabSidebarGen(categoriesResponse["categories"]));

        $('#contentSidebar').html( contentTabSidebarGen(categoriesResponse["categories"], layersReponse["layers"] ));

        $('.check-layer').change(function () {
            var isBaseMap = $(this).attr("layer-base");
            var layerSelect;

            //Identificamos si es mapa base o capa para saber en que grupo buscar
            if (isBaseMap == "true") {
                layerSelect = baseMaps[$(this).attr("layer-name")];
                layerSelect.setZIndex(1);
                validateCheckBaseMap(this);
            } else {
                layerSelect = overlayMaps[$(this).attr("layer-name")];
                layerSelect.setZIndex(99);
            }
            //Verificamos el estado del control, para activar o desactivar la capa
            if (this.checked) {
                map.addLayer(layerSelect);

            } else {
                map.removeLayer(layerSelect);
            }
        });

        function validateCheckBaseMap(currentChek) {
            $('#contentSidebar input:checkbox').each(function () {
                var isBaseMap = $(this).attr("layer-base");
                if (isBaseMap == "true") {
                    if (this != currentChek) {
                        $(this).filter(':checkbox').prop('checked', false);
                        var layerSelect = baseMaps[$(this).attr("layer-name")];
                        //Deshabilitar capas
                        map.removeLayer(layerSelect);
                    }
                }
            });
        }

        const map = L.map('map', {
            center: [19.042630302101365, -98.20635704789369],
            zoom: 12,
            layers: defaultLayer
        });

        var sidebar = L.control.sidebar({
            autopan: false,
            closeButton: true,
            container: 'sidebar',
            position: 'right',
        }).addTo(map);

        layersReponse["layers"].forEach(function (layer) {
            if(layer.default){
                if (layer.base_map) {
                    layerSelect = baseMaps[layer.title_layer];
                    layerSelect.setZIndex(1);
                } else {
                    layerSelect = overlayMaps[layer.title_layer];
                    layerSelect.setZIndex(99);
                }
                map.addLayer(layerSelect);
            }
        });
    });
</script>

</html>
