<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Libraries\General;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class StudentAPIController extends Controller
{

  public function index()
  {
    $data['status'] = General::getEnumValues('students', 'status');

    return view('students-api-web.students-list', $data);
  }
  public function ListingData(Request $request)
  {
    try {
      $returnArray = [];
      $inputParams = $request->all();
      $inputParams['search'] = $inputParams['search'] ?? null;
      $postInput = [
        'limit' => $inputParams['limit'],
        'offset' => $inputParams['offset'],
        'order' => $inputParams['order'],
        'sort' => $inputParams['sort'],
        'search' => $inputParams['search']
      ];
      $apiURL = 'http://192.168.20.50:8000/api/crud/listing';
      $headers = [];
      $response = Http::withHeaders($headers)->post($apiURL, $postInput);
      $responseData = $response->json();
      $listingData = array('count' => $responseData['data']['count'], 'data' => $responseData['data']['systemServerList'], 'status' => $responseData['data']['status']);
      $returnArray = $listingData;
    } catch (\Exception $e) {
      $returnArray  = $e->getMessage();
    }
    return $returnArray;
  }
}
