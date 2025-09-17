class LocationMap {
    constructor(mapId, latInputId, lngInputId, fieldMap, formId) {
        this.mapId = mapId;
        this.latInput = $("#" + latInputId);
        this.lngInput = $("#" + lngInputId);
        this.fieldMap = fieldMap;
        this.formId = formId; // 👈 form id jisme autofill hoga

        this.defaultLatLng = { lat: 31.5497, lng: 74.3436 }; // Lahore
        this.map = null;
        this.marker = null;
        this.autocomplete = null;
        this.geocoder = new google.maps.Geocoder();

        this.initMap();
        this.initSearch();
        this.initCurrentLocation();
    }

    // Initialize Map
    initMap() {
        this.map = new google.maps.Map(document.getElementById(this.mapId), {
            center: this.defaultLatLng,
            zoom: 12
        });

        this.marker = new google.maps.Marker({
            position: this.defaultLatLng,
            map: this.map,
            draggable: true
        });

        this.updatePosition(this.defaultLatLng.lat, this.defaultLatLng.lng);

        // Marker dragend update
        google.maps.event.addListener(this.marker, 'dragend', () => {
            let pos = this.marker.getPosition();
            this.updatePosition(pos.lat(), pos.lng());
            this.reverseGeocode(pos.lat(), pos.lng());
        });

        // Map click → set marker
        google.maps.event.addListener(this.map, 'click', (event) => {
            let clickedPos = event.latLng;
            this.marker.setPosition(clickedPos);
            this.updatePosition(clickedPos.lat(), clickedPos.lng());
            this.reverseGeocode(clickedPos.lat(), clickedPos.lng());
        });
    }

    // Autocomplete Search
    initSearch() {
        let input = document.getElementById("map-search");
        this.autocomplete = new google.maps.places.Autocomplete(input);
        this.autocomplete.bindTo("bounds", this.map);

        this.autocomplete.addListener("place_changed", () => {
            let place = this.autocomplete.getPlace();
            if (!place.geometry) return;

            if (place.geometry.viewport) {
                this.map.fitBounds(place.geometry.viewport);
            } else {
                this.map.setCenter(place.geometry.location);
                this.map.setZoom(15);
            }

            this.marker.setPosition(place.geometry.location);
            this.updatePosition(place.geometry.location.lat(), place.geometry.location.lng());
            this.fillAddressFields(place.address_components);
        });
    }

    // Fill Address Fields
    fillAddressFields(components) {
        let values = {};
        components.forEach(component => {
            let types = component.types;
            for (let t of types) {
                if (this.fieldMap[t]) {
                    values[this.fieldMap[t]] = component.long_name;
                }
            }
        });

        // Autofill the form by form ID
        if (this.formId) {
            fillValuesToForm(this.formId, values);
        }
    }

    // Update Hidden Inputs
    updatePosition(lat, lng) {
        this.latInput.val(lat);
        this.lngInput.val(lng);
    }

    // Reverse Geocoding (lat/lng → address)
    reverseGeocode(lat, lng) {
        let latlng = { lat: parseFloat(lat), lng: parseFloat(lng) };
        this.geocoder.geocode({ location: latlng }, (results, status) => {
            if (status === "OK" && results[0]) {
                this.fillAddressFields(results[0].address_components);
            }
        });
    }

    // Current Location Button
    initCurrentLocation() {
        $("#map-current-location").on("click", () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    let pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    this.map.setCenter(pos);
                    this.map.setZoom(15);
                    this.marker.setPosition(pos);
                    this.updatePosition(pos.lat, pos.lng);
                    this.reverseGeocode(pos.lat, pos.lng);
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        });
    }
}