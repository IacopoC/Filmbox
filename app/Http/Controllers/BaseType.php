<?php

namespace App\Http\Controllers;

use App\Http\moviedb\ThemovieDatabase;

class BaseType extends Controller
{
    private $service;
    protected $api_key;
    protected $baseUrl;

    public function __construct() {

        $this->api_key = '2daef69f5e47a9f774cd8db16ffba569';
        $this->service = new ThemovieDatabase();
    }

    private function buildCall($type_media, $id)
    {
        $string = $this->baseUrl . '/3/' . $type_media . '/' . $id . '?api_key=' . $this->api_key . '&language=it-IT';

        return $this->service->callMovie('get',$this->baseUrl . $string);
    }

    private function buildCallSession()
    {
        $string = $this->baseUrl . '/3/authentication/guest_session/new?api_key=' . $this->api_key;

        return $this->service->callMovie('get',$this->baseUrl . $string);
    }

    private function buildCallTime($type_media, $id, $time_window)
    {
        $string = $this->baseUrl . '/3/' . $type_media . '/' . $id . '/'. $time_window . '?api_key=' . $this->api_key . '&language=it-IT';

        return $this->service->callMovie('get',$this->baseUrl . $string);
    }

    private function buildSearchCall($type_media, $query)
    {
        $string = $this->baseUrl . '/3/' . $type_media . '/movie' . '?api_key=' . $this->api_key . '&language=it-IT&query=' . $query;

        return $this->service->callMovie('get',$this->baseUrl . $string);
    }

    private function buildDiscoverCall($type_media, $genre)
    {
        $string = $this->baseUrl . '/3/' . $type_media . '/movie' . '?api_key=' . $this->api_key . '&with_genres='. $genre . '&sort_by=vote_average.desc&vote_count.gte=10';

        return $this->service->callMovie('get',$this->baseUrl . $string);
    }

    private function buildCallLists($type_media)
    {
        $currentDate = date("Y-m-d");
        $previousDate = date("Y-m-d", strtotime(" -1 months"));

        $string = $this->baseUrl . '/3/' . $type_media . '/movie?api_key=' . $this->api_key . '&language=it-IT&primary_release_date.gte=' . $previousDate . '&primary_release_date.lte=' . $currentDate;

        return $this->service->callMovie('get',$this->baseUrl . $string);
    }



    public function getMovie($id)
    {
        return $this->buildCall('movie', $id);
    }

    public function getTrendingMovie($id, $time_window) {

        return $this->buildCallTime('trending', $id, $time_window);
    }


    public function getLatestMovies() {

        return $this->buildCallLists('discover',null);
    }


    public function searchMovie($query)
    {
        return $this->buildSearchCall('search', $query);
    }

    public function getDiscoverMovie($genre)
    {
        return $this->buildDiscoverCall('discover',$genre);
    }

    public function getGuestSession()
    {

        return $this->buildCallSession();
    }

}
