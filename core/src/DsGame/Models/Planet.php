<?php

namespace DsGame\Models;

class Planet extends Base {

    protected $table = 'planets';

    public function getResource($planet_id, $resource_id)
    {
        $resource = Planet::where('id', '=', $planet_id)->first();

        if ($resource_id == 1) {
            $total = $resource->resource1;
        } elseif ($resource_id == 2) {
            $total = $resource->resource2;
        } elseif ($resource_id == 3) {
            $total = $resource->resource3;
        } elseif ($resource_id == 4) {
            $total = $resource->resource4;
        }

        return $total;
    }
}

