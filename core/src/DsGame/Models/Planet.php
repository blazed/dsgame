<?php

namespace DsGame\Models;

use DB;

class Planet extends Base {

    protected $table = 'planets';

    public static function createNewPlanet($planet_map_id, $user_id, $username, $race_id, $new = 0)
    {
        $planet = DB::table('planets_map')->where('id', $planet_map_id)->first();

        if ($planet)
        {
            if ($new == 1)
            {
                $type_id = '3';
                $capital = '1';
                $name = $username . '\'s planet';
            }
            else {
                $type_id = $planet->type_id;
                $capital = '0';
                $name = 'New Planet';
            }

            $params = array(
                'id' => $planet_map_id,
                'name' => $name,
                'x'  => $planet->x,
                'y'  => $planet->y,
                'user_id' => $user_id,
                'type_id' => $type_id,
                'capital' => $capital,
                'race_id'    => $race_id,
                'workers' => '2',
            );

            if (Planet::create($params))
            {
                DB::table('planets_map')
                    ->where('id', $planet_map_id)
                    ->update(array(
                        'type_id' => $type_id,
                        'workers' => '2',
                        'user_id' => $user_id,
                    )
                );
            }
        }

    }

    public static function getEmptyPlanetId($location)
    {
        if ($location == 0) {
            $location = rand(1, 4);
        }

        $planet = DB::table('planets_registration')->distinct('id')->where('zone_id', $location)->where('registered', '1')->get();

        if ($planet < 200)
        {
            //$planetList = array();
            $planetList = DB::table('planets_registration')->where('zone_id', $location)->where('registered', '0')->orderBy('id', 'asc')->take('200')->get();

            if ($planet)
            {
                //$random = rand(0, count($planetList) - 1);
                $random =  rand(0, count($planetList) - 1);
                
                //return $planetList->take($random);
                
                //return $planetList[$random]->planet_id;
            }
            else
            {
                echo "error_random_planet";
            }
        }
        else
        {
            
            $tesst = DB::table('planets_registration')->where('zone_id', $location)->where('registered', '0')->orderBy('id', 'asc')->first();
            return $tesst->planet_id;
        }
    }

    public static function updateRegPlanets($planet_map_id)
    {
        $planet = DB::table('planets_registration')->where('planet_id', $planet_map_id)->update(array(
                'registered' => '1',
            )
        );
    }

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

