<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Landing_page');
    }

    public function login(): string
    {
        return view('Login');
    }

    public function monitoringTournamentsRankings()
    {
        return view('Monitoring_Tournaments_Rankings');
    }
}
