<?php

namespace Quarterloop\UptimeTile\Commands;

use Illuminate\Console\Command;
use Quarterloop\UptimeTile\Services\UptimeAPI;
use Quarterloop\UptimeTile\UptimeStore;

class FetchUptimeCommand extends Command
{
    protected $signature = 'dashboard:fetch-uptime-data';

    protected $description = 'Fetch uptime data';

    public function handle(UptimeAPI $uptime_api)
    {

        $this->info('Fetching uptime data ...');

        $uptime = $uptime_api::getUptime(
            config('dashboard.tiles.hosting.url'),
            config('dashboard.tiles.geekflare.key'),
        );

        UptimeStore::make()->setData($uptime);

        $this->info('Stored data ...');

        $this->info('All done!');
    }
}
