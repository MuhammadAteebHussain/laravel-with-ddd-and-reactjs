<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class StoreFilmRequest
{

    public static function ApiValidation($request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|max:50',
            'film_slug'     => 'required|unique:films,film_slug|max:100',
            'description'     => 'required',
            'release_date'     => 'date_format:Y-m-d|required||max:50',
            'ticket_price'     => 'required||max:50',
            'country_id'     => 'required||max:100',
            'photo'     => 'required|file|max:10000',
            'genre_ids'     => 'required|exists:genres,id|max:50',
        ]);

        return $validator;
    }
}
