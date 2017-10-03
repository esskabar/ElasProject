
<section class="contact-map">
    <div class="map" id="map"></div>
</section>

<script>
    (function(){
        var styles = [
            {
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                ]
            },
            {
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                    }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                ]
            },
            {
                "featureType": "administrative.land_parcel",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#bdbdbd"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                    }
                ]
            },
            {
                "featureType": "poi.business",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#ffffff"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#dadada"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            },
            {
                "featureType": "transit",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                ]
            },
            {
                "featureType": "transit.station",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#c9c9c9"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            }
        ];

        function initMap() {

            var usRoadMapType = new google.maps.StyledMapType([
                {
                    featureType: 'all',
                    elementType: 'all',
                    stylers: [
                        { saturation: -90 },
                        { lightness: 10 }

                    ]
                }
            ], {name: 'Elas'});


            var uluru = {lat: 47.1851758, lng: 8.5304608};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: uluru,
                mapTypeControlOptions: {
                    position: google.maps.ControlPosition.TOP_LEFT,
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP,
                        google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID,
                        google.maps.MapTypeId.TERRAIN, 'usroadatlas']
                },
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP
                },
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP
                }
            });

            map.mapTypes.set('usroadatlas', usRoadMapType);
            map.setMapTypeId('usroadatlas');
            var contentString = '<div class="map-info-box">'+
                '<div class="map-head">'+
                '<h3>Elas Immobilien & Mobilien GmbH</h3></div>'+
                '<p class="map-address"><i class="fa fa-map-marker"></i> Am Rainbach 12 6340 Baar <br><i class="fa fa-phone"></i> +41 (0) 555 05 80<br><span class="map-email"><i class="fa fa-envelope"></i> info@elas.ch</span></p>'+
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            // var image = 'http://icons.iconarchive.com/icons/paomedia/small-n-flat/48/map-marker-icon.png';
            var image = {
                path: 'M15.6,0C7,0,0,7,0,15.6S15.7,50,15.7,50s15.6-25.8,15.6-34.4S24.2,0,15.6,0z M15.6,23.1c-4.1,0-7.5-3.3-7.5-7.5c0-4.1,3.3-7.5,7.5-7.5c4.1,0,7.5,3.3,7.5,7.5C23.1,19.7,19.7,23.1,15.6,23.1z',
                fillColor: '#08a0f9',
                fillOpacity: 1,
                scale: 0.8,
                strokeWeight: 0,
                anchor: new google.maps.Point(20, 40)
            };

            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
                icon: image,
                title: 'Uluru (Ayers Rock)'
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
            marker.addListener('click', function() {
                map.setZoom(14);
                map.setCenter(marker.getPosition());
            });
        }
//        google.maps.event.addDomListener(window, "load", initMap);
        window.initMap = initMap;

//        window.onorientationchange = function(){window.location.reload();}
    })()
</script>

