<?php

namespace App\Services\General;

use App\Contracts\GenreServiceInterface;
use App\Services\Application\AssignGenreApplicationService;
use App\Services\Application\GetAllGenreApplicationService;

class GenreService implements GenreServiceInterface
{

    protected AssignGenreApplicationService $assign_genre_film_application_service;
    protected GetAllGenreApplicationService $get_all_genre_service;


    public function __construct(
        GeneralResponseService $general_response_service,
        AssignGenreApplicationService $assign_genre_film_application_service,
        GetAllGenreApplicationService $get_all_genre_service
    ) {
        $this->general_response_service = $general_response_service;
        $this->assign_genre_film_application_service = $assign_genre_film_application_service;
        $this->get_all_genre_service = $get_all_genre_service;
    }

    public  function listGenres(): array
    {
        return $this->get_all_genre_service->execute();
    }

    public function assignGeneriesToFilm(object $validated_requet) : array
    {
        return $this->assign_genre_film_application_service->execute($validated_requet);
    }
}