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
<div id="map"></div>
<!--<button id="convert" type="button">
    Get all features to GeoJSON string
</button>-->
<button type="button" class="btn btn-success btn-circle btn-lg" id="convert">
    <i class="fa fa-floppy-o"></i>
</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
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

    var osmUrl      = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        osmAttrib   = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        osm         = L.tileLayer(osmUrl, {
            maxZoom: 18,
            attribution: osmAttrib
        }),
        map         = L.map('map', {
            layers: [osm],
            center: [19.042630302101365, -98.20635704789369],
            zoom: 12
        }),
        editableLayers = L.geoJson().addTo(map);

    map.addControl(new L.Control.Draw({
        position:'topright',
        edit: {
            featureGroup: editableLayers
        }
    }));

    map.on('draw:created', function (e) {

        var layer = e.layer,
            feature = layer.feature = layer.feature || {},
            props = feature.properties = feature.properties || {};

        feature.type    = feature.type || "Feature";
        feature.id      = uuid();

        editableLayers.addLayer(layer);
        addPopup(layer);
    });


    $(document).ready(function () {

        $.getJSON("webroot/gis/paraderos_ruta_1.geojson", function(data) {
            console.log(data);
            L.geoJson(data, {

            }).addTo(map);
        });

        $.getJSON("webroot/gis/alimentadoras_ruta_5.geojson", function(data) {
            console.log(data);
            L.geoJson(data, {
                style: {
                    "color": "#19ff00",
                    "weight": 5
                }
            }).addTo(map);
        });


        $('#convert').on('click',function(){
            /*let data = console.log(JSON.stringify(editableLayers.toGeoJSON(), null, 2));*/
            let _btn = $(this);

            $.ajax({
                url: '/Map/SaveGeometric',
                method: "POST",
                data: editableLayers.toGeoJSON(),
                success:function(e) {

                },
                beforeSend:function() {
                    _btn.prop('disabled',true).find('i').removeClass('fa-floppy-o').addClass('fa-spin fa-spinner');
                    console.log(editableLayers.toGeoJSON());
                },
                complete:function() {
                    _btn.prop('disabled',false).find('i').addClass('fa-floppy-o').removeClass('fa-spin fa-spinner');
                },
                error:function(e) {

                }
            });
        });

        $('#btnSaveGeometry').on('click',function (){
            let geometry    = editableLayers._layers;
            let data        = $('#formGeometry').serializeObject();

            for ( let i in geometry)
            {
                if( geometry[i].feature.id == data.uuid)
                    geometry[i].feature.properties = data;
            }

            $('#attributes').modal('hide');
        });

    });
</script>

</html>
