document.addEventListener("DOMContentLoaded", function(event) {

//sidebar stuff START
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)

        // SIDEBAR shit
        if(toggle && nav && bodypd && headerpd){
            toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-menu-alt-left')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
            })
        }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')

    //nav_link active
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
//sidebar stuff END


    //Map controls and settings
    const map = L.map('map', {
        center: [13.629841, 123.184358],
        zoom: 17,
        maxZoom: 18,
        minZoom: 3,
    });
    L.control.zoom({
        position: 'bottomright'
    }).addTo(map);


    //icons
    const locationIcon = L.icon({
        iconUrl: 'img/locpin.png',
        iconSize: [35, 35],
    });
    const tricycleIcon = L.icon({
        iconUrl: 'img/Icons/Vehicle-Markers/Vehicle Markers/tricyMark.png',
        iconSize: [50, 73.5],
    });
    const jeepneyIcon = L.icon({
        iconUrl: 'img/Icons/Vehicle-Markers/Vehicle Markers/jeepneyMark.png',
        iconSize: [50, 73.5],
    });
    const pedicabIcon = L.icon({
        iconUrl: 'img/Icons/Vehicle-Markers/Vehicle Markers/pedicabMark.png',
        iconSize: [50, 73.5],
    });
    const busIcon = L.icon({
        iconUrl: 'img/Icons/Vehicle-Markers/Vehicle Markers/busMark.png',
        iconSize: [50, 73.5],
    });
    const vanIcon = L.icon({
        iconUrl: 'img/Icons/Vehicle-Markers/Vehicle Markers/vanMark.png',
        iconSize: [50, 73.5],
    });
    

    //ESSENTIAL line to include map to Lunad
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' }).addTo(map);

    /*declaring marker groups
    var tricyMarkers = L.markerClusterGroup();
    var jeepMarkers = L.markerClusterGroup();
    var pedicabMarkers = L.markerClusterGroup();
    var busMarkers = L.markerClusterGroup();
    var vanMarkers = L.markerClusterGroup();*/

    //tricy markers
    const adnuFront = L.marker([13.630363, 123.185575], {icon: tricycleIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/tricy.png" width="20"></img> <b>Tricycle</b><br/> <p><b>Regular Fare: </b>13 Pesos<br/> <b>Time: </b>07:00 AM - 07:00 PM</p>')
    const avonPlaza = L.marker([13.622961, 123.184748], {icon: tricycleIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/tricy.png" width="20"></img> <b>Tricycle</b><br/> <p><b>Regular Fare: </b>13 Pesos<br/> <b>Time: </b>06:00 AM - 10:00 PM</p>')

    //jeepney markers
    const plaza = L.marker([13.623385, 123.184854], {icon: jeepneyIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/jeepney.png" width="20"></img> <b>Jeepney</b><br/> <p><b>Regular Fare: </b>12 Pesos<br/> <b>Time: </b>07:00 AM - 09:00 PM</p>')
    const aranaSt = L.marker([13.625968, 123.184379], {icon: jeepneyIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/jeepney.png" width="20"></img> <b>Jeepney</b><br/> <p><b>Regular Fare: </b>12 Pesos<br/> <b>Time: </b>12:00 NN - 08:00 PM</p>')

    //pedicab markers
    const staCruzProper = L.marker([13.628155, 123.184370], {icon: pedicabIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/pedicab.png" width="20"></img> <b>Pedicab</b><br/> <p><b>Regular Fare: </b>10 Pesos<br/> <b>Time: </b>07:00 AM - 07:00 PM</p>')
    const uncFront = L.marker([13.624771, 123.184282], {icon: pedicabIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/pedicab.png" width="20"></img> <b>Pedicab</b><br/> <p><b>Regular Fare: </b>10 Pesos<br/> <b>Time: </b>07:00 AM - 07:00 PM</p>')
    const adnuGate2 = L.marker([13.629608, 123.183325], {icon: pedicabIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/pedicab.png" width="20"></img> <b>Pedicab</b><br/> <p><b>Regular Fare: </b>10 Pesos<br/> <b>Time: </b>07:00 AM - 07:00 PM</p>')

    //bus markers
    const bicolCentralStation = L.marker([13.619143, 123.189653], {icon: busIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/bus.png" width="20"></img> <b>Bus</b><br/> <p><b>Regular Fare: </b>Varies<br/> <b>Time: </b>24/7</p>')
    
    //van markers
    const queboracTerm = L.marker([13.634150, 123.185675], {icon: vanIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/van.png" width="20"></img> <b>Van</b><br/> <p><b>Regular Fare: </b>Varies<br/> <b>Time: </b>07:00 AM - 07:00 PM</p>')
    const legVanTerm = L.marker([13.619734, 123.193910], {icon: vanIcon})
        .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/van.png" width="20"></img> <b>Van</b><br/> <p><b>Regular Fare: </b>Varies<br/> <b>Time: </b>07:00 AM - 07:00 PM</p>')
    
    /*adding markers to marker groups
    tricyMarkers.addLayer(adnuFront, avonPlaza);
    jeepMarkers.addLayer(plaza, aranaSt);
    pedicabMarkers.addLayer(staCruzProper, uncFront, adnuGate2);
    busMarkers.addLayer(bicolCentralStation);
    vanMarkers.addLayer(queboracTerm, legVanTerm);*/

    //LAYERS
    var tricyLayer = L.layerGroup([adnuFront, avonPlaza]);
    var jeepLayer = L.layerGroup([plaza, aranaSt]);
    var pedicabLayer = L.layerGroup([staCruzProper, uncFront, adnuGate2]);
    var busLayer = L.layerGroup([bicolCentralStation]);
    var vanLayer = L.layerGroup([queboracTerm, legVanTerm]);


    //adding markers to map
    document.getElementById('tricycleBtn').addEventListener('click', ()=>{
        if(map.hasLayer(tricyLayer)){
            map.removeLayer(tricyLayer);
        }
        else{
            if(map.hasLayer(jeepLayer)){
                map.removeLayer(jeepLayer);
            }
            if(map.hasLayer(pedicabLayer)){
                map.removeLayer(pedicabLayer);
            }
            if(map.hasLayer(busLayer)){
                map.removeLayer(busLayer);
            }
            if(map.hasLayer(vanLayer)){
                map.removeLayer(vanLayer);
            }
    
            tricyLayer.addTo(map);
        }
    })

    document.getElementById('jeepneyBtn').addEventListener('click', ()=>{
        if(map.hasLayer(jeepLayer)){
            map.removeLayer(jeepLayer);
        }
        else{
            if(map.hasLayer(tricyLayer)){
                map.removeLayer(tricyLayer);
            }
            if(map.hasLayer(pedicabLayer)){
                map.removeLayer(pedicabLayer);
            }
            if(map.hasLayer(busLayer)){
                map.removeLayer(busLayer);
            }
            if(map.hasLayer(vanLayer)){
                map.removeLayer(vanLayer);
            }
            
            jeepLayer.addTo(map);
        }
    })
    document.getElementById('pedicabBtn').addEventListener('click', ()=>{
        if(map.hasLayer(pedicabLayer)){
            map.removeLayer(pedicabLayer);
        }
        else{
            if(map.hasLayer(tricyLayer)){
                map.removeLayer(tricyLayer);
            }
            if(map.hasLayer(jeepLayer)){
                map.removeLayer(jeepLayer);
            }
            if(map.hasLayer(busLayer)){
                map.removeLayer(busLayer);
            }
            if(map.hasLayer(vanLayer)){
                map.removeLayer(vanLayer);
            }

            pedicabLayer.addTo(map);
        }
    })
    document.getElementById('busBtn').addEventListener('click', ()=>{    
        if(map.hasLayer(busLayer)){
            map.removeLayer(busLayer);
        }
        else{
            if(map.hasLayer(tricyLayer)){
                map.removeLayer(tricyLayer);
            }
            if(map.hasLayer(jeepLayer)){
                map.removeLayer(jeepLayer);
            }
            if(map.hasLayer(pedicabLayer)){
                map.removeLayer(pedicabLayer);
            }
            if(map.hasLayer(vanLayer)){
                map.removeLayer(vanLayer);
            }

            busLayer.addTo(map);
        }
    })
    document.getElementById('vanBtn').addEventListener('click', ()=>{
        if(map.hasLayer(vanLayer)){
            map.removeLayer(vanLayer);
        }
        else{
            if(map.hasLayer(tricyLayer)){
                map.removeLayer(tricyLayer);
            }
            if(map.hasLayer(jeepLayer)){
                map.removeLayer(jeepLayer);
            }
            if(map.hasLayer(pedicabLayer)){
                map.removeLayer(pedicabLayer);
            }
            if(map.hasLayer(busLayer)){
                map.removeLayer(busLayer);
            }

            vanLayer.addTo(map);
        }
    })

    //saved markers
    document.getElementById('saved1').addEventListener('click', ()=>{
        if(map.hasLayer(tricyLayer)){
            map.removeLayer(tricyLayer);
        }
        if(map.hasLayer(jeepLayer)){
            map.removeLayer(jeepLayer);
        }
        if(map.hasLayer(pedicabLayer)){
            map.removeLayer(pedicabLayer);
        }
        if(map.hasLayer(busLayer)){
            map.removeLayer(busLayer);
        }
        if(map.hasLayer(vanLayer)){
            map.removeLayer(vanLayer);
        }

        adnuFront.addTo(map);
    })

});