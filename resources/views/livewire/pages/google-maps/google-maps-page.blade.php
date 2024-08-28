<div class="w-full h-auto">
    <button type="submit" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-large-modal" data-hs-overlay="#hs-large-modal" class="py-2 px-3 self-end mt-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none mb-3">
        Add HeatMap
    </button>
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
    
    <div id="hs-large-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-large-modal-label">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
          <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
              <h3 id="hs-large-modal-label" class="font-bold text-gray-800 dark:text-white">
                Add New HeatMap
              </h3>
              <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-large-modal">
                <span class="sr-only">Close</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 6 6 18"></path>
                  <path d="m6 6 12 12"></path>
                </svg>
              </button>
            </div>
            <form wire:submit.prevent="addPoint">
                <div class="p-4 overflow-y-auto">
                    <div class="p-4 md:p-5 flex flex-col">
                        <div id="selectionMap" class="w-full h-[500px]"></div>
                        <div class="mt-5">
                            <div class="sm:flex rounded-lg shadow-sm">
                            <span class="py-3 px-4 inline-flex items-center min-w-fit w-full border border-gray-200 bg-gray-50 text-sm text-gray-500 -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:w-auto sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400">Latitude & Longitude</span>
                            <input type="text" wire:model="lat" class="py-3 px-4 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <input type="text" wire:model="lng" class="py-3 px-4 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            </div>
                        </div>       
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-large-modal">
                    Close
                </button>
                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save HeatMap
                </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    {{-- <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70 mt-10">
        <form wire:submit.prevent="addPoint">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                Add New HeatMap
            </p>
            </div>
            <div class="p-4 md:p-5 flex flex-col">
                <div id="selectionMap" class="w-full h-[200px]"></div>
                <div class="mt-5">
                    <div class="sm:flex rounded-lg shadow-sm">
                    <span class="py-3 px-4 inline-flex items-center min-w-fit w-full border border-gray-200 bg-gray-50 text-sm text-gray-500 -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:w-auto sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400">Latitude & Longitude</span>
                    <input type="text" wire:model="lat" class="py-3 px-4 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <input type="text" wire:model="lng" class="py-3 px-4 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    </div>
                </div> 
                <button type="submit" class="py-2 px-3 self-end mt-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Add HeatMap
                </button>       
            </div>
        </form>
    </div> --}}

    <script>
        function myMap() {
            let marker;
            var heat = @json($heatmapData);

            const googleHeatmapData = heat.map(point => {
                if (point.latitude && point.longitude) {
                    const lat = parseFloat(point.latitude);
                    const lng = parseFloat(point.longitude);
                    if (!isNaN(lat) && !isNaN(lng)) {
                        return new google.maps.LatLng(lat, lng);
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
                zoom: 15.5,
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
                data: googleHeatmapData,
                radius: 20,
                gradient: gradient
            });

            heatmap.setMap(map);

        }
    </script>

    <script>
        document.addEventListener('livewire:initialized', () => {

        let component = @this;
        let marker;
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
            
        });

        });
    </script>
    <script>
         window.addEventListener('reload', event => {
            window.location.reload();
        })
    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=API_KEY&loading=async&libraries=visualization&callback=myMap">
    </script>
</div>
