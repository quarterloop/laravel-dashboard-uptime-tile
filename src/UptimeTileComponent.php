<?php

namespace Quarterloop\UptimeTile;

use Livewire\Component;
use Illuminate\Support\DB;

class UptimeTileComponent extends Component
{

    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {

      $uptimeStore = UptimeStore::make();

        return view('dashboard-uptime-tile::tile', [
            'website'         => config('dashboard.tiles.hosting.url'),

            'lastUpdateTime'  => date('H:i:s', strtotime($uptimeStore->getLastUpdateTime())),
            'lastUpdateDate'  => date('d.m.Y', strtotime($uptimeStore->getLastUpdateDate())),
        ]);
    }
}
