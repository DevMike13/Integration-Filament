<?php

namespace App\Livewire\Pages\GoogleMaps;

use App\Models\HeatMap;
use Livewire\Component;

class GoogleMapsPage extends Component
{
    public $heatmapData = [];
    public $lat;
    public $lng;

    public function mount()
    {
        // $this->heatmapData = [
        //     ['lat' => 13.96309989449683, 'lng' => 121.52555394837445, 'weight' => 3],
        //     ['lat' => 13.963740220120123, 'lng' => 121.52712572285718],
        //     ['lat' => 13.964401367473776, 'lng' => 121.52934659192151, 'weight' => 2],
        // ];
        $this->fetchHeatmapData();
    }

    public function fetchHeatmapData()
    {
        $this->heatmapData = HeatMap::select('latitude', 'longitude', 'weight')->get()->toArray();
    }

    public function selectHeatPoint($latitude, $longitude)
    { 
        
        $this->lat = $latitude;
        $this->lng = $longitude;
        dd($latitude);
       
    }

    public function addPoint()
    {
        if($this->lat && $this->lng){
            HeatMap::create([
                'latitude' => $this->lat,
                'longitude' => $this->lng,
                'weight' => 1,
            ]);
        }
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.google-maps.google-maps-page');
    }
}
