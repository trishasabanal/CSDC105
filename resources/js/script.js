document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)
    
        // Validate that all variables exist
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
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
        // Your code to run since DOM is loaded and ready
        var map = L.map('map', {
            center: [13.629841, 123.184358],
            zoom: 17,
            maxZoom: 18,
            minZoom: 3,
        });
        
        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);
    
        const locationIcon = L.icon({
            iconUrl: 'img/locpin.png',
            iconSize: [40, 40],
        });
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { 
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' 
        }).addTo(map);
    
        const marker1 = L.marker([13.630363, 123.185575], {icon: locationIcon})
            .bindPopup('<img class="mx-1" src="img/Icons/Vehicle Icons/tricy.png" width="20"></img> <b>Tricycle</b><br/> <p><b>Regular Fare: </b>13 Pesos<br/> <b>Time: </b>07:00 AM - 07:00 PM</p>')
            .addTo(map);
        const marker2 = L.marker([13.628146, 123.184450], {icon: locationIcon})
            .bindPopup('<b>Pedicab</b><br/> <p><b>Regular Fare: </b>10 Pesos<br/> <b>Time: </b>06:00 AM - 07:00 PM</p>')
            .addTo(map);
        const marker3 = L.marker([13.629579, 123.183326], {icon: locationIcon}).addTo(map);
        const marker4 = L.marker([13.625989, 123.184749], {icon: locationIcon}).addTo(map);
        const marker5 = L.marker([13.624851, 123.184302], {icon: locationIcon}).addTo(map);
        const marker6 = L.marker([13.634069, 123.189960], {icon: locationIcon}).addTo(map);
        const marker7 = L.marker([13.634209, 123.185717], {icon: locationIcon}).addTo(map);
        const marker8 = L.marker([13.623031, 123.184687], {icon: locationIcon}).addTo(map);
        const marker9 = L.marker([13.623910, 123.183889], {icon: locationIcon}).addTo(map);
    
        L.Routing.control({
            waypoints: [
                L.latLng(13.628146, 123.184450),
                L.latLng(13.629579, 123.183326)
            ]
        }).addTo(map);
    
    });
    
    