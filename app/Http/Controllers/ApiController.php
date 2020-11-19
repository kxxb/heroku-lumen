<?php


namespace App\Http\Controllers;

use App\Models\TestModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function getTestData(Request $request)
    {

        $data = [
            'res'     => 1,
            'message' => 'OK',
            'data'    => [$request->input()]
        ];
        return $data;
    }

    public function getDbData(Request $request)
    {
        $model = TestModel::all();
        $data = [
            'res'     => 1,
            'message' => 'OK',
            'data'    => $model
        ];
        return $data;
    }
}
