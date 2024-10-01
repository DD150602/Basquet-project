<?php

namespace App\Controllers;

use App\Models\TournamentModel;

class Home extends BaseController
{
    protected $tournamentModel;

    public function __construct()
    {
        $this->tournamentModel = new TournamentModel();
    }

    public function index(): string
    {
        $data['tournaments'] = $this->tournamentModel->getAllTournaments();
        return view('Landing_page', $data);
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
