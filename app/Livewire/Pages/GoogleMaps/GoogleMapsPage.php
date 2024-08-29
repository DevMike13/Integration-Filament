<?php

namespace App\Livewire\Pages\GoogleMaps;

use App\Models\HeatMap;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class GoogleMapsPage extends Component
{
    public $heatmapData = [];
    public $lat;
    public $lng;
    public $fullAddress;
    public $hazardType;
    
    #[Url]
    public $filters = [];

    protected $listeners = ['updatedFilter'];

    public function mount()
    {
        $this->fetchHeatmapData();
    }

    // public function fetchSelectedHeatMapDetails($id){
    //     $this->heatmapDetailsData = HeatMap::select('latitude', 'longitude', 'weight', 'full_address')->where('id', $id)->first()->toArray();
    //     $this->dispatch('heatmapDetailsUpdated', $this->heatmapDetailsData);
    // }
    
    public function updatedFilter($value)
    {
        $this->filters;
        $this->fetchHeatmapData();
        
    }
    public function reload(){
        $this->js('window.location.reload()'); 
    }
    public function fetchHeatmapData()
    {
        $query = HeatMap::select('id','latitude', 'longitude', 'weight', 'full_address', 'hazard_type');

        if (!empty($this->filters)) {
            $query->whereIn('hazard_type', $this->filters);
        }

        $this->heatmapData = $query->get()->toArray();
        
    }

    public function addHeatMap()
    {
        $this->validate([ 
            'hazardType' => 'required',
        ]);

        if($this->lat && $this->lng && $this->fullAddress){
            HeatMap::create([
                'latitude' => $this->lat,
                'longitude' => $this->lng,
                'weight' => 1,
                'full_address' => $this->fullAddress,
                'hazard_type' => $this->hazardType
            ]);
        }
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.google-maps.google-maps-page');
    }
}
