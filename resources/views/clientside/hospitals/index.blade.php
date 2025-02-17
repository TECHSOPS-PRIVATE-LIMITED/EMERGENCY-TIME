@extends('clientside.layouts.app')
@section('clientside')
    <style>
        #map {
            height: 500px;
            width: 100%;
        }

        .map-container {
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .top-controls {
            display: flex;
            justify-content: center;
            position: relative;
            z-index: 5;
            padding: 10px 0;
        }

        .search-container {
            width: 60%;
            max-width: 500px;
            margin: 0 auto;
        }

        #search-box {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .map-content {
            display: flex;
            gap: 15px;
        }

        #directions-container {
            width: 300px;
            flex-shrink: 0;
            display: none;
        }

        #directions-panel {
            max-height: 500px;
            overflow: auto;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        #map-wrapper {
            flex-grow: 1;
            position: relative;
        }

        #location-warning {
            background: #fff8e1;
            border: 1px solid #ffe082;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 15px;
            display: none;
        }

        #enable-location-btn {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .map-type-control {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 5;
        }

        .map-type-btn {
            background: white;
            border: 1px solid #ccc;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
        }

        .map-type-btn.active {
            background: #eee;
            font-weight: bold;
        }

        #custom-origin-container {
            display: none;
            margin-top: 10px;
        }

        #custom-origin {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #use-custom-origin-btn {
            background: #4285F4;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 5px;
        }

        #origin-toggle {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        #origin-toggle label {
            margin-left: 5px;
            cursor: pointer;
        }

        /* Hospital list styles */
        #hospitals-list {
            max-height: 500px;
            overflow-y: auto;
            background: white;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
            width: 350px;
            display: none;
        }

        .hospital-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        .hospital-item:hover {
            background-color: #f5f5f5;
        }

        .hospital-item:last-child {
            border-bottom: none;
        }

        .hospital-name {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .hospital-type {
            color: #666;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .hospital-rating {
            color: #fbbc04;
            margin-bottom: 5px;
        }

        .hospital-address {
            color: #555;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .hospital-hours {
            color: #0b8043;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .website-btn, .directions-btn {
            background: white;
            border: 1px solid #1a73e8;
            color: #1a73e8;
            border-radius: 20px;
            padding: 5px 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .website-btn i, .directions-btn i {
            margin-right: 5px;
        }

        .list-header {
            padding: 15px;
            margin: 0;
            border-bottom: 1px solid #eee;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-to-list {
            color: #1a73e8;
            cursor: pointer;
            display: flex;
            align-items: center;
            font-size: 14px;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .back-to-list i {
            margin-right: 5px;
        }
    </style>

    <div class="container mt-4">
        <div id="location-warning">
            <p><i class="fas fa-exclamation-triangle text-warning"></i> We need your location to show nearby hospitals.</p>
            <button id="enable-location-btn">Enable Location</button>
        </div>

        <div class="map-container">
            <div class="top-controls">
                <div class="search-container">
                    <input id="search-box" type="text" placeholder="Search for a hospital...">
                    <div id="origin-toggle">
                        <input type="checkbox" id="use-custom-location">
                        <label for="use-custom-location">Use custom starting location</label>
                    </div>
                    <div id="custom-origin-container">
                        <input id="custom-origin" type="text" placeholder="Enter your starting location...">
                        <button id="use-custom-origin-btn">Set Starting Point</button>
                    </div>
                </div>
            </div>

            <div class="map-content">
                <div id="hospitals-list"></div>
                <div id="directions-container">
                    <div class="back-to-list" id="back-to-list-btn">
                        <i class="fas fa-arrow-left"></i> Back to results
                    </div>
                    <div id="directions-panel"></div>
                </div>
                <div id="map-wrapper">
                    <div class="map-type-control">
                        <button id="roadmap-btn" class="map-type-btn active">Map</button>
                        <button id="satellite-btn" class="map-type-btn">Satellite</button>
                    </div>
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let map;
        let infoWindow;
        let markers = [];
        let searchBox;
        let originSearchBox;
        let directionsService;
        let directionsRenderer;
        let userPosition = null;
        let customOrigin = null;
        let hospitalsList = [];

        function initMap() {
            // Default center (Lahore)
            const defaultCenter = {
                lat: 31.5204,
                lng: 74.3587
            };

            // Initialize map
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultCenter,
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false // We'll use our custom controls
            });

            // Initialize directions service
            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                panel: document.getElementById('directions-panel')
            });

            // Initialize info window
            infoWindow = new google.maps.InfoWindow();

            // Initialize search box - restrict to hospitals only
            const input = document.getElementById("search-box");
            searchBox = new google.maps.places.SearchBox(input);

            // Initialize origin search box
            const originInput = document.getElementById("custom-origin");
            originSearchBox = new google.maps.places.SearchBox(originInput);

            // Bias SearchBox results towards current map's viewport
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
                originSearchBox.setBounds(map.getBounds());
            });

            // Listen for the event fired when the user selects a prediction
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // For each place, get the icon, name and location
                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }

                    // Fetch hospitals near the searched location
                    fetchHospitals(
                        place.geometry.location.lat(),
                        place.geometry.location.lng()
                    );
                });

                map.fitBounds(bounds);
            });

            // Set up custom origin search box
            originSearchBox.addListener("places_changed", () => {
                const places = originSearchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }

                const place = places[0];
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                customOrigin = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng(),
                    name: place.name || place.formatted_address
                };

                // Remove existing custom origin marker if any
                markers = markers.filter(marker => {
                    if (marker.getIcon() && marker.getIcon().includes("green-dot")) {
                        marker.setMap(null);
                        return false;
                    }
                    return true;
                });

                // Add marker for custom origin
                const customOriginMarker = new google.maps.Marker({
                    position: customOrigin,
                    map: map,
                    icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                    title: "Custom Starting Point"
                });

                markers.push(customOriginMarker);
                map.setCenter(customOrigin);
            });

            // Setup custom origin toggle
            document.getElementById('use-custom-location').addEventListener('change', function(e) {
                document.getElementById('custom-origin-container').style.display =
                    e.target.checked ? 'block' : 'none';
            });

            // Setup use custom origin button
            document.getElementById('use-custom-origin-btn').addEventListener('click', function() {
                if (customOrigin) {
                    // Find hospitals near the custom origin
                    fetchHospitals(customOrigin.lat, customOrigin.lng);
                } else {
                    alert('Please enter and select a valid starting location');
                }
            });

            // Setup map type controls
            document.getElementById('roadmap-btn').addEventListener('click', function() {
                map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
                setActiveMapTypeButton('roadmap-btn');
            });

            document.getElementById('satellite-btn').addEventListener('click', function() {
                map.setMapTypeId(google.maps.MapTypeId.HYBRID); // HYBRID includes satellite with labels
                setActiveMapTypeButton('satellite-btn');
            });

            // Back to list button
            document.getElementById('back-to-list-btn').addEventListener('click', function() {
                document.getElementById('hospitals-list').style.display = 'block';
                document.getElementById('directions-container').style.display = 'none';
                directionsRenderer.setMap(null);

                // Restore all markers
                markers.forEach(marker => {
                    marker.setMap(map);
                });
            });

            // Try HTML5 geolocation
            tryGeolocation();
        }

        function setActiveMapTypeButton(activeId) {
            document.querySelectorAll('.map-type-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.getElementById(activeId).classList.add('active');
        }

        function tryGeolocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        // Success - hide warning if visible
                        document.getElementById("location-warning").style.display = "none";

                        userPosition = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        map.setCenter(userPosition);

                        // Add marker for user's location
                        const userMarker = new google.maps.Marker({
                            position: userPosition,
                            map: map,
                            icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                            title: "Your Location"
                        });

                        markers.push(userMarker);

                        // Fetch nearby hospitals with 100km radius (100,000 meters)
                        fetchHospitals(userPosition.lat, userPosition.lng);
                    },
                    (error) => {
                        // Error - show warning
                        document.getElementById("location-warning").style.display = "block";
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                document.getElementById("location-warning").style.display = "block";
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        const enableLocationBtn = document.getElementById("enable-location-btn");
        if (enableLocationBtn) {
            enableLocationBtn.addEventListener("click", function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            document.getElementById("location-warning").style.display = "none";
                            userPosition = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            map.setCenter(userPosition);

                            // Remove existing user marker if any
                            markers = markers.filter(marker => {
                                if (marker.getIcon() && marker.getIcon().includes("blue-dot")) {
                                    marker.setMap(null);
                                    return false;
                                }
                                return true;
                            });

                            const userMarker = new google.maps.Marker({
                                position: userPosition,
                                map: map,
                                icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                                title: "Your Location"
                            });

                            markers.push(userMarker);

                            fetchHospitals(userPosition.lat, userPosition.lng);
                        },
                        (error) => {
                            console.error("Geolocation error:", error);
                            alert("Error: Please enable location services and try again.");
                            document.getElementById("location-warning").style.display = "block";
                        }
                    );
                } else {
                    alert("Error: Your browser doesn't support geolocation.");
                }
            });
        }

        function fetchHospitals(lat, lng) {
            // Clear any existing hospital markers (but keep user marker and custom origin marker)
            markers = markers.filter(marker => {
                if (marker.getIcon() === null ||
                    (marker.getIcon() !== null && !marker.getIcon().includes("blue-dot") && !marker.getIcon().includes("green-dot"))) {
                    marker.setMap(null);
                    return false;
                }
                return true;
            });

            // Clear hospitals list
            hospitalsList = [];
            document.getElementById('hospitals-list').innerHTML = '';

            // Show hospitals list
            document.getElementById('hospitals-list').style.display = 'block';

            // Hide directions if showing
            document.getElementById('directions-container').style.display = 'none';
            directionsRenderer.setMap(null);

            // Use 100,000 meters (100km) radius
            fetch(`/hospitals?lat=${lat}&lng=${lng}&radius=100000&keyword=hospital`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === "OK") {
                        // Filter results to only include actual hospitals
                        const filteredResults = filterHospitals(data.results);
                        hospitalsList = filteredResults;

                        if (filteredResults.length > 0) {
                            addHospitalMarkers(filteredResults);
                            renderHospitalsList(filteredResults);
                        } else {
                            document.getElementById('hospitals-list').innerHTML = `
                                <div class="list-header">Results</div>
                                <div style="padding: 15px;">No hospitals found in this area</div>
                            `;
                        }
                    } else {
                        console.error("Error fetching hospitals:", data.status);
                        if (data.error_message) {
                            alert(`Error: ${data.error_message}`);
                        }

                        document.getElementById('hospitals-list').innerHTML = `
                            <div class="list-header">Results</div>
                            <div style="padding: 15px;">Error loading hospitals</div>
                        `;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    document.getElementById('hospitals-list').innerHTML = `
                        <div class="list-header">Results</div>
                        <div style="padding: 15px;">Error loading hospitals</div>
                    `;
                });
        }

        function filterHospitals(results) {
            return results.filter(place => {
                // Check if "hospital" is in the name (case insensitive)
                const nameHasHospital = place.name.toLowerCase().includes('hospital');

                // Check if hospital is in the types array
                const typesHasHospital = place.types &&
                    (place.types.includes('hospital') ||
                     place.types.includes('hospital') && place.name.toLowerCase().includes('hospital'));

                return nameHasHospital || typesHasHospital;filteredResults
            });
        }

        function renderHospitalsList(hospitals) {
            const listContainer = document.getElementById('hospitals-list');
            listContainer.innerHTML = `<div class="list-header">Results <span>(${hospitals.length})</span></div>`;

            hospitals.forEach((hospital, index) => {
                const item = document.createElement('div');
                item.className = 'hospital-item';

                // Format rating with stars
                let ratingDisplay = '';
                if (hospital.rating) {
                    const starsDisplay = '★'.repeat(Math.floor(hospital.rating));
                    ratingDisplay = `
                        <div class="hospital-rating">
                            ${starsDisplay} (${hospital.user_ratings_total || 0})
                        </div>
                    `;
                }

                // Hospital type
                let typeDisplay = '';
                if (hospital.types && hospital.types.length > 0) {
                    const formattedType = hospital.types[0]
                        .replace(/_/g, ' ')
                        .replace(/\b\w/g, l => l.toUpperCase());
                    typeDisplay = `<div class="hospital-type">${formattedType}</div>`;
                }

                // Open hours
                const hoursDisplay = hospital.opening_hours && hospital.opening_hours.open_now ?
                    `<div class="hospital-hours">Open 24 hours</div>` : '';

                const position = {
                    lat: hospital.geometry.location.lat,
                    lng: hospital.geometry.location.lng
                };

                item.innerHTML = `
                    <div class="hospital-name">${hospital.name}</div>
                    ${typeDisplay}
                    ${ratingDisplay}
                    <div class="hospital-address">${hospital.vicinity}</div>
                    ${hoursDisplay}
                    <div class="action-buttons">
                        ${hospital.website ?
                          `<a href="${hospital.website}" target="_blank" class="website-btn">
                            <i class="fas fa-globe"></i> Website
                           </a>` : ''}
                        <button class="directions-btn" onclick="showDirections(${position.lat}, ${position.lng}, '${hospital.name.replace(/'/g, "\\'")}')">
                            <i class="fas fa-directions"></i> Directions
                        </button>
                    </div>
                `;

                item.addEventListener('click', (e) => {
                    // Don't trigger if they clicked on a button
                    if (e.target.tagName === 'BUTTON' ||
                        e.target.tagName === 'A' ||
                        e.target.tagName === 'I' ||
                        e.target.closest('button') ||
                        e.target.closest('a')) {
                        return;
                    }

                    // Center map on this hospital and open its info window
                    map.setCenter(position);

                    // Find the marker for this hospital and trigger a click
                    markers.forEach(marker => {
                        if (marker.getTitle() === hospital.name) {
                            google.maps.event.trigger(marker, 'click');
                        }
                    });
                });

                listContainer.appendChild(item);
            });
        }

        function addHospitalMarkers(hospitals) {
            hospitals.forEach(hospital => {
                const position = {
                    lat: hospital.geometry.location.lat,
                    lng: hospital.geometry.location.lng
                };

                const marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: hospital.name
                });

                marker.addListener("click", () => {
                    // Format rating with stars if available
                    let ratingDisplay = 'N/A';
                    if (hospital.rating) {
                        const fullStars = Math.floor(hospital.rating);
                        const halfStar = hospital.rating % 1 >= 0.5;
                        ratingDisplay = '★'.repeat(fullStars) + (halfStar ? '½' : '') +
                            ' (' + hospital.rating + ')';
                    }

                    // Add directions button if user location or custom origin is available
                    const canShowDirections = userPosition || customOrigin;
                    const directionsButton = canShowDirections ?
                        `<button onclick="showDirections(${position.lat}, ${position.lng}, '${hospital.name.replace(/'/g, "\\'")}')"
                         style="margin-top:10px; padding:5px 10px; background:#4285F4; color:white; border:none;
                         border-radius:3px; cursor:pointer;">
                            <i class="fas fa-directions"></i> Get Directions
                         </button>` : '';

                    const content = `
                        <div style="max-width: 300px">
                            <h3>${hospital.name}</h3>
                            <p><strong>Address:</strong> ${hospital.vicinity}</p>
                            <p><strong>Rating:</strong> ${ratingDisplay}</p>
                            ${hospital.opening_hours ?
                                `<p><strong>Status:</strong> ${hospital.opening_hours.open_now ?
                                        '<span style="color:green">Open now</span>' :
                                        '<span style="color:red">Closed</span>'}</p>` : ''}
                            ${hospital.photos ?
                                `<img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=150&photoreference=${hospital.photos[0].photo_reference}&key={{ env('GOOGLE_MAPS_API_KEY') }}"
                                         style="max-width:100%; margin-top:10px">` : ''}
                            ${directionsButton}
                        </div>
                    `;
                    infoWindow.setContent(content);
                    infoWindow.open(map, marker);
                });

                markers.push(marker);
            });
        }

        function showDirections(destLat, destLng, destName) {
            // Hide hospitals list
            document.getElementById('hospitals-list').style.display = 'none';

            // Show directions container
            document.getElementById('directions-container').style.display = 'block';

            // Set directions renderer to map
            directionsRenderer.setMap(map);

            // Determine origin: custom origin if it exists and is selected, otherwise user position
            let origin;
            let useCustom = document.getElementById('use-custom-location').checked;

            if (useCustom && customOrigin) {
                origin = customOrigin;
            } else if (userPosition) {
                origin = userPosition;
            } else {
                alert("Unable to get your location. Please enable location services or enter a custom starting point.");
                return;
            }

            const destination = { lat: destLat, lng: destLng };

            directionsService.route(
                {
                    origin: origin,
                    destination: destination,
                    travelMode: google.maps.TravelMode.DRIVING
                },
                (response, status) => {
                    if (status === "OK") {
                        // Display the directions
                        directionsRenderer.setDirections(response);

                        // Clear existing content in directions panel
                        const dirPanel = document.getElementById("directions-panel");
                        dirPanel.innerHTML = '';

                        // Add title to directions panel
                        const titleDiv = document.createElement('div');
                        titleDiv.innerHTML = `<h4 style="margin-top:0">Directions to ${destName}</h4>`;
                        if (useCustom && customOrigin) {
                            titleDiv.innerHTML += `<p>From: ${customOrigin.name || 'Custom Location'}</p>`;
                        } else {
                            titleDiv.innerHTML += `<p>From: Your Current Location</p>`;
                        }
                        dirPanel.appendChild(titleDiv);

                        // Add the directions steps
                        const directionsDiv = document.createElement('div');
                        directionsDiv.className = 'directions-steps';
                        dirPanel.appendChild(directionsDiv);

                        // Add directions steps
                        const route = response.routes[0];
                        const leg = route.legs[0];

                        // Summary
                        const summaryDiv = document.createElement('div');
                        summaryDiv.innerHTML = `
                            <p><strong>Distance:</strong> ${leg.distance.text}</p>
                            <p><strong>Estimated time:</strong> ${leg.duration.text}</p>
                        `;
                        dirPanel.appendChild(summaryDiv);

                        // Steps
                        const stepsDiv = document.createElement('div');
                        stepsDiv.className = 'directions-steps';

                        leg.steps.forEach((step, i) => {
                            const stepDiv = document.createElement('div');
                            stepDiv.className = 'direction-step';
                            stepDiv.innerHTML = `
                                <div style="display:flex; margin-bottom:10px">
                                    <div style="flex-shrink:0; margin-right:10px; font-weight:bold">${i+1}.</div>
                                    <div>${step.instructions}</div>
                                </div>
                            `;
                            stepsDiv.appendChild(stepDiv);
                        });

                        dirPanel.appendChild(stepsDiv);

                        // Close the info window
                        infoWindow.close();
                    } else {
                        alert("Directions request failed due to " + status);
                    }
                }
            );
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation ?
                "Error: Please enable location services to find hospitals near you." :
                "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places">
    </script>
@endsection
