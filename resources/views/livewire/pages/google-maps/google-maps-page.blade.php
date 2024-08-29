<div class="w-full h-auto">
    <div class="w-full h-auto flex justify-between items-center gap-10">
        <button type="submit" x-on:click="$openModal('add-heatmap')" class="py-2 px-3 w-32 self-end mt-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none mb-3">
            Add HeatMap
        </button>
        <div class="w-96"  wire:ignore>
            <x-select
                placeholder="Select Filter"
                multiselect
                clearable="false"
                :options="['Car Accident', 'Slippery', 'Fire', 'Extreme Temperature']"
                wire:model="filters"
               
            >
                <x-slot name="afterOptions" class="p-2 flex justify-center">
                    <x-button
                        x-on:click="close"
                        primary
                        flat
                        full 
                        wire:click="reload"
                    >
                        <span>Apply</span>
                    </x-button>
                </x-slot>
            </x-select>
        </div>
    </div>
    
    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
        <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
        <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
            HeatMaps Pins
        </p>
        </div>
        <div class="p-4 md:p-5 flex flex-col">
            <div id="map" class="w-full h-[500px]"></div>
        </div>
    </div>

    <x-modal name="add-heatmap" persistent max-width="4xl" align="center">
        <x-card title="Add HeatMap">
            <div class="overflow-y-auto">
                <div class="flex flex-col">
                    <div id="selectionMap" class="w-full h-[300px]"></div>
                    <div class="mt-5">
                        <div class="mb-3">
                            <x-select
                                label="Select Hazard Type"
                                placeholder="Select Hazard Type"
                                :options="['Car Accident', 'Slippery', 'Fire', 'Extreme Temperature']"
                                wire:model.defer="hazardType"
                            />
                        </div>
                        
                        <div class="relative mb-3">
                            <input type="text" disabled wire:model="fullAddress" class="peer py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Location">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                    <path fill-rule="evenodd" d="m9.69 18.933.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 0 0 .281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 1 0 3 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 0 0 2.273 1.765 11.842 11.842 0 0 0 .976.544l.062.029.018.008.006.003ZM10 11.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" clip-rule="evenodd" />
                                </svg>                                      
                            </div>
                        </div>
                        <div class="sm:flex rounded-lg shadow-sm">
                            <span class="py-3 px-4 inline-flex items-center min-w-fit w-full border border-gray-200 bg-gray-50 text-sm text-gray-500 -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:w-auto sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400">Latitude & Longitude</span>
                            <input type="text" disabled wire:model="lat" class="py-3 px-4 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <input type="text" disabled wire:model="lng" class="py-3 px-4 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        </div>
                    </div>       
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="addHeatMap" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-modal name="heatmap-details-modal">
        <x-card title="HeatMap Details">
           <div class="w-full h-auto">
                <div id="map-details" class="w-full h-[300px]"></div>
                <div class="flex flex-col gap-4 my-5">
                    <h1 class="text-gray-500">Hazard Type: <span id="hazard" class="font-semibold text-black"></span></h1>
                    <h1 class="text-gray-500">Location: <span id="address" class="font-semibold text-black"></span></h1>
                    <h1 class="text-gray-500">Lat: <span id="latitude" class="font-semibold text-black"></span></h1>
                    <h1 class="text-gray-500">long: <span id="longitude" class="font-semibold text-black"></span></h1>
                </div>
           </div>
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-button flat label="Close" x-on:click="close" />
            </x-slot>
        </x-card>
    </x-modal>

    <script>
        function initMap() {
            let marker;
            var heat = @json($heatmapData);
        
            const googleHeatmapData = heat.map(point => {
                if (point.latitude && point.longitude) {
                    const lat = parseFloat(point.latitude);
                    const lng = parseFloat(point.longitude);
                    if (!isNaN(lat) && !isNaN(lng)) {
                        return {
                            location: new google.maps.LatLng(lat, lng),
                            weight: point.weight,
                            address: point.full_address,
                            id: point.id,
                            type: point.hazard_type,
                        };
                    } else {
                        console.error('Invalid latitude or longitude:', point);
                        return null;
                    }
                } else {
                    console.error('Invalid heatmap data:', point);
                    return null;
                }
            }).filter(point => point !== null);

            var sariaya = new google.maps.LatLng(13.962391890110284, 121.52345109650678);

            map = new google.maps.Map(document.getElementById('map'), {
                center: sariaya,
                zoom: 14,
                mapTypeId: 'roadmap'
            });

            var gradient = [
                'rgba(0, 0, 255, 0)',
                'rgba(0, 0, 255, 1)',
                'rgba(0, 255, 255, 1)',
                'rgba(0, 255, 0, 1)',
                'rgba(255, 255, 0, 1)',
                'rgba(255, 165, 0, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(255, 0, 0, 1)'
            ];

            var heatmap = new google.maps.visualization.HeatmapLayer({
                data: googleHeatmapData.map(data => data.location),
                radius: 20,
                gradient: gradient
            });

            heatmap.setMap(map);

            googleHeatmapData.forEach(point => {
                // const marker = new google.maps.Marker({
                //     position: point.location,
                //     map: map,
                //     opacity: 0,
                //     title: `Location: ${point.location.lat()}, ${point.location.lng()}`
                // });

                // marker.addListener('click', () => {
                //     alert(`You clicked on heatmap point at latitude: ${point.location.lat()}, longitude: ${point.location.lng()}`);
                // });

                const circle = new google.maps.Circle({
                    strokeColor: "#FF0000",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#FF0000",
                    fillOpacity: 0.35,
                    map: map,
                    center: point.location,
                    radius: 20
                });

                circle.addListener('click', () => {
                    $openModal('heatmap-details-modal');

                    mapDetails = new google.maps.Map(document.getElementById('map-details'), {
                        center: point.location,
                        zoom: 15.5,
                        mapTypeId: 'roadmap'
                    });

                    document.getElementById('hazard').innerHTML = point.type;
                    document.getElementById('address').innerHTML = point.address;
                    document.getElementById('latitude').innerHTML = point.location.lat();
                    document.getElementById('longitude').innerHTML = point.location.lng();

                    const marker = new google.maps.Marker({
                        position: point.location,
                        map: mapDetails,
                        title: "Heatmap Center"
                    });

                    const detailsLat = point.location.lat();
                    const detailsLng = point.location.lng();

                    const heatmapData = [
                        {
                            location: new google.maps.LatLng(detailsLat, detailsLng),
                        }
                    ];
                    const heatmap = new google.maps.visualization.HeatmapLayer({
                        data: heatmapData.map(data => data.location),
                        radius: 20,
                        gradient: gradient
                    });
                    heatmap.setMap(mapDetails);
                });
            });
        }
    </script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            let component = @this;
            let marker;

            const geocoder = new google.maps.Geocoder();
            var sariaya = new google.maps.LatLng(13.962391890110284, 121.52345109650678);

            map = new google.maps.Map(document.getElementById('selectionMap'), {
                center: sariaya,
                zoom: 16,
                mapTypeId: 'roadmap'
            });

            map.addListener('click', function(event) {
                const lat = event.latLng.lat();
                const lng = event.latLng.lng();

                component.lat = lat;
                component.lng = lng;
                
                if (marker) {
                    marker.setMap(null);
                } 
                marker = new google.maps.Marker({
                    position: { lat: lat, lng: lng },
                    map: map
                });

                geocodeLatLng(geocoder, map, marker.getPosition());
            });

            function geocodeLatLng(geocoder, map, latLng) {
                geocoder.geocode({ location: latLng }, (results, status) => {
                    if (status === "OK") {
                        if (results[0]) {
                            const address = results[0].formatted_address;
                            // alert(`The address for this location is: ${address}`);
                            component.fullAddress = address;

                        } else {
                            alert("No results found");
                        }
                    } else {
                        alert(`Geocoder failed due to: ${status}`);
                    }
                });
            }
        });
    </script>
    <script>
       
            // Listen for the 'filters-updated' event dispatched by Livewire
            window.addEventListener('filters-updated', function () {
                // Reload the page
                console.log('hello')
            });
       
    </script>
    <script>
         window.addEventListener('reload', event => {
            window.location.reload();
        })
    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=API_KEY&loading=async&libraries=visualization&callback=initMap">
    </script>
</div>  
