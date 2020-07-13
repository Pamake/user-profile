<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * @var array
     */
    public $data = [];

    public function __construct()
    {

        view()->share('calling_codes', $this->getCallingCodes());
        view()->share('calling_sectors', $this->getCallingSectors());
        view()->share('calling_promotions', $this->getCallingPromotions());

    }



    public function getCallingCodes()
    {
        $codes = [];
        foreach(config('calling_codes.codes') as $code) {
            $codes = Arr::add($codes, $code['code'], array('name' => $code['name'], 'dial_code' => $code['dial_code']));
        };
        return $codes;
    }


    public function getCallingSectors()
    {
        $sectors = [];
        foreach(config('calling_sectors.sectors') as $sector) {
            $sectors = Arr::add($sectors, $sector['code'], array('name' => $sector['name']));
        };
        return $sectors;
    }

    public function getCallingPromotions()
        {
            $promotions = [];
            foreach(config('calling_sectors.promotions') as $promotion) {
                $promotions = Arr::add($promotions, $promotion['code'], array('name' => $promotion['name']));
            };
            return $promotions;
        }
}
