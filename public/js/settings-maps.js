//START GOGOLE MAPS
//map
var map;
var brooklyn = new google.maps.LatLng(40.726164, -73.993886);

var MY_MAPTYPE_ID = 'custom_style';

function initialize() {


    //start snazzy options
    var featureOpts = 
    [
    {
        "featureType": "landscape",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
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
        "stylers": [
            {
                "hue": "#00aaff"
            },
            {
                "saturation": -100
            },
            {
                "gamma": 2.15
            },
            {
                "lightness": 12
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": 24
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 57
            }
        ]
    }
    ];
    //end snazzy options
    
    



    //start map options
    var mapOptions = {
        zoom: 14,
        center: brooklyn,
        disableDefaultUI: true,
        scrollwheel: false,
        mapTypeControlOptions: {
          mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
        },
        mapTypeId: MY_MAPTYPE_ID
    };
    //end map options
    
    
    

    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

    var styledMapOptions = {
        name: 'Custom Style'
    };

    var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

    map.mapTypes.set(MY_MAPTYPE_ID, customMapType);


    
    //START 2
    
    //marker
    var image_2 = new google.maps.MarkerImage("img/icons/marker-church.png", null, null, null, new google.maps.Size(33,50));
    var positionpin_2 = new google.maps.LatLng(40.726928, -73.994015);
    var marker_2 = new google.maps.Marker({
      position: positionpin_2,
      icon: image_2,
      map: map,
      flat: true,
      title: 'Uluru (Ayers Rock)'
    });
    

    //box
    var boxText_2 = document.createElement("div");
    boxText_2.innerHTML = '<div class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr grid grid_6 percentage nicdark_border_white"><img class="nicdark_focus nicdark_border_white" src="img/banners/map-church.jpg"></div><div class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr grid grid_6 percentage nicdark_border_white"><div class="nicdark_focus center nicdark_sizing nicdark_padding20 nicdark_paddingright30 nicdark_bg_white"><h4><strong>THE CHURCH</strong></h4><div class="nicdark_space20"></div><h5>CERIMONY</h5><div class="nicdark_space20"></div><div class="nicdark_divider center small"><span class="nicdark_bg_grey2 "></span></div><div class="nicdark_space20"></div><p>11:30 AM</p></div></div>';

    var marker_2_options = {
         content: boxText_2
        ,disableAutoPan: false
        ,maxWidth: 0
        ,pixelOffset: new google.maps.Size(-190, -230)
        ,zIndex: null
        ,boxStyle: { 
          opacity: 1,
          width: "380px",
          background: "#fff",
         }
        ,closeBoxMargin: "10px"
        ,closeBoxURL: "img/icons/map-close.png"
        ,infoBoxClearance: new google.maps.Size(1, 1)
        ,isHidden: false
        ,pane: "floatPane"
        ,enableEventPropagation: false
    };

	var info_box_2 = new InfoBox(marker_2_options);
    
    google.maps.event.addListener(marker_2, 'click', function() {
        info_box_2.open(map,marker_2);
    });
    
    info_box_2.open(map,marker_2);
    //end 2
    
    
    
    
    //START 3
    
    //marker
    var image_3 = new google.maps.MarkerImage("img/icons/marker-restaurant.png", null, null, null, new google.maps.Size(33,50));
    var positionpin_3 = new google.maps.LatLng(40.712812, -74.016073);
    var marker_3 = new google.maps.Marker({
      position: positionpin_3,
      icon: image_3,
      map: map,
      flat: true,
      title: 'Uluru (Ayers Rock)'
    });
    

    //box
    var boxText_3 = document.createElement("div");
    boxText_3.innerHTML = '<div class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr grid grid_6 percentage nicdark_border_white"><img class="nicdark_focus nicdark_border_white" src="img/banners/map-restaurant.jpg"></div><div class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr grid grid_6 percentage nicdark_border_white"><div class="nicdark_focus center nicdark_sizing nicdark_padding20 nicdark_paddingright30 nicdark_bg_white"><h4><strong>RESTAURANT</strong></h4><div class="nicdark_space20"></div><h5>PARTY</h5><div class="nicdark_space20"></div><div class="nicdark_divider center small"><span class="nicdark_bg_grey2 "></span></div><div class="nicdark_space20"></div><p>13:30 PM</p></div></div>';

    var marker_3_options = {
         content: boxText_3
        ,disableAutoPan: false
        ,maxWidth: 0
        ,pixelOffset: new google.maps.Size(-190, -230)
        ,zIndex: null
        ,boxStyle: { 
          opacity: 1,
          width: "380px",
          background: "#fff",
         }
        ,closeBoxMargin: "10px"
        ,closeBoxURL: "img/icons/map-close.png"
        ,infoBoxClearance: new google.maps.Size(1, 1)
        ,isHidden: false
        ,pane: "floatPane"
        ,enableEventPropagation: false
    };

	var info_box_3 = new InfoBox(marker_3_options);
    
    google.maps.event.addListener(marker_3, 'click', function() {
        info_box_3.open(map,marker_3);
    });
    
    info_box_3.open(map,marker_3);
    //end 3

    
    
    
    //START 4
    
    //marker
    var image_4 = new google.maps.MarkerImage("img/icons/marker-hotel.png", null, null, null, new google.maps.Size(33,50));
    var positionpin_4 = new google.maps.LatLng(40.710665, -73.978737);
    var marker_4 = new google.maps.Marker({
      position: positionpin_4,
      icon: image_4,
      map: map,
      flat: true,
      title: 'Uluru (Ayers Rock)'
    });
    

    //box
    var boxText = document.createElement("div");
    boxText.innerHTML = '<div class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr grid grid_6 percentage nicdark_border_white"><img class="nicdark_focus nicdark_border_white" src="img/banners/map-hotel.jpg"></div><div class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr grid grid_6 percentage nicdark_border_white"><div class="nicdark_focus center nicdark_sizing nicdark_padding20 nicdark_paddingright30 nicdark_bg_white"><h4><strong>HARD ROCKS</strong></h4><div class="nicdark_space20"></div><h5>HOTEL</h5><div class="nicdark_space20"></div><div class="nicdark_divider center small"><span class="nicdark_bg_grey2 "></span></div><div class="nicdark_space20"></div><p><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></p></div></div>';

    var marker_4_options = {
         content: boxText
        ,disableAutoPan: false
        ,maxWidth: 0
        ,pixelOffset: new google.maps.Size(-190, -230)
        ,zIndex: null
        ,boxStyle: { 
          opacity: 1,
          width: "380px",
          background: "#fff",
         }
        ,closeBoxMargin: "10px"
        ,closeBoxURL: "img/icons/map-close.png"
        ,infoBoxClearance: new google.maps.Size(1, 1)
        ,isHidden: false
        ,pane: "floatPane"
        ,enableEventPropagation: false
    };

	var info_box_4 = new InfoBox(marker_4_options);
    
    google.maps.event.addListener(marker_4, 'click', function() {
        info_box_4.open(map,marker_4);
    });
    
    info_box_4.open(map,marker_4);
    //end 4
    
    
    


}

google.maps.event.addDomListener(window, 'load', initialize);
//END GOOGLE MAPS 