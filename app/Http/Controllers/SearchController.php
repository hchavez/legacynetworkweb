<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function search(Request $request, $resource)
    {
        switch ($resource) {
            case "users":
            case "distributors":
                $result = User::search($request->get('q'))
                    ->select([
                        'users.id',
                        'users.first_name',
                        'users.middle_name',
                        'users.last_name',
                        'users.email',
                        DB::raw('CONCAT(users.first_name, " ", IFNULL(users.middle_name, ""), " ", users.last_name) as display_name')
                    ])
                    ->get();

                return response($result);

            default:
                break;
        }

        return response(['msg' => 'no results']);
    }
}
