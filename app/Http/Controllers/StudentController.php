<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Libraries\General;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data['status'] = General::getEnumValues('students', 'status');

    return view('students.students-list', $data);
  }
  /**
   * Show the form for creating a new resource.
   */
  public function ListingData(Request $request)
  {
    try {
      $returnArray = [];
      $inputParams = $request->all();
      $data = Student::limit($inputParams['limit'])->offset($inputParams['offset'])
        ->where('first_name', 'LIKE', '%' . $inputParams['search'] . '%')
        ->orWhere('last_name', 'LIKE', '%' . $inputParams['search'] . '%')
        ->orWhere('email', 'LIKE', '%' . $inputParams['search'] . '%')
        ->orWhere('mobile', 'LIKE', '%' . $inputParams['search'] . '%')
        ->orderBy($inputParams['sort'], $inputParams['order'])->get();
      $dataCount = Student::where('first_name', 'LIKE', '%' . $inputParams['search'] . '%')
        ->orWhere('last_name', 'LIKE', '%' . $inputParams['search'] . '%')
        ->orWhere('email', 'LIKE', '%' . $inputParams['search'] . '%')
        ->orWhere('mobile', 'LIKE', '%' . $inputParams['search'] . '%')->get();
      $count = $dataCount->count();
      $listingData = array('count' => $count, 'data' => $data);
      $returnArray = $listingData;
    } catch (\Exception $e) {
      $returnArray  = $e->getMessage();
    }
    return $returnArray;
  }

  /**
   * Store a newly created resource in storage.
   */
  public function add(Request $request)
  {

    return view('students.crud-add');
  }

  /**
   * Display the specified resource.
   */
  public function addAction(Request $request)
  {
    try {
      $inputParams = $request->all();
      $validator = Validator::make($request->all(), [
        "first_name" => "required",
        "last_name" => "required",
        "email" => "required",
        "profile" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        "address" => "required",
        "mobile" => "required",
        "course" => "required",
        "status" => "required",

      ]);

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      }
      $imageName = '';
      $extensionArr = ['jpg', 'png', 'jpeg', 'gif'];
      if ($request->has('profile') && !empty($request->file('profile')->getClientOriginalName())) {
        $imageExt = $request->file('profile')->extension();
        if (in_array($imageExt, $extensionArr)) {
          $imageName = 'students' . time() . '.' . $imageExt;
          $request->profile->move(public_path('upload/students/'), $imageName);
        } else {
          return redirect()->back()->with('error', 'Please Select Valid Image Extension ex-.jpeg,.png,.jpg,.gif')->withInput();
        }
      }
      $student = new Student();
      $student->first_name = $inputParams['first_name'];
      $student->last_name = $inputParams['last_name'];
      $student->email = $inputParams['email'];
      $student->mobile = $inputParams['mobile'];
      $student->address = $inputParams['first_name'];
      $student->course = $inputParams['course'];
      $student->status = $inputParams['status'];
      $student->profile = $imageName;
      $student->save();
      if (!$student) {
        return redirect()->back()->with('error', 'Failure in adding record')->withInput();
      }
      return redirect(url('crud/list'))->withSuccess('successfully added');
    } catch (\Exception $e) {
      return back()->withError($e->getMessage());
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $params = [];
    $resultData = Student::where('id', $id)->first();

    if (empty($resultData)) {
      return redirect(url('/crud/list'))->withWarning('No records found..');
    }

    $params['listingData'] = $resultData;

    return view('students.crud-edit', $params);
  }

  /**
   * Update the specified resource in storage.
   */
  public function editAction(Request $request, string $id)
  {

    try {
      $inputParams = $request->all();
      $validator = Validator::make($request->all(), [
        "first_name" => "required",
        "last_name" => "required",
        "email" => "required",
        "address" => "required",
        "mobile" => "required",
        "course" => "required",
        "status" => "required",
      ]);

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      }
      $imageName = '';
      $extensionArr = ['jpg', 'png', 'jpeg', 'gif'];
      if ($request->has('profile') && !empty($request->file('profile')->getClientOriginalName())) {
        $imageExt = $request->file('profile')->extension();
        if (in_array($imageExt, $extensionArr)) {
          $imageName = 'students' . time() . '.' . $imageExt;
          $request->profile->move(public_path('upload/students/'), $imageName);
          if (!empty($request->old_image_name)) {
            $image_path = public_path('upload/students/' . $request->old_image_name);
            if (File::exists($image_path)) {
              File::delete($image_path);
            }
          }
        } else {
          return redirect()->back()->with('error', 'Please Select Valid Image Extension ex-.jpeg,.png,.jpg,.gif')->withInput();
        }
      }
      $student = Student::where('id', $id)->first();
      $student->first_name = $inputParams['first_name'];
      $student->last_name = $inputParams['last_name'];
      $student->email = $inputParams['email'];
      $student->mobile = $inputParams['mobile'];
      $student->address = $inputParams['first_name'];
      $student->course = $inputParams['course'];
      $student->status = $inputParams['status'];
      if ($request->has('profile')) {
        $student->profile = $imageName;
      }
      $student->save();
      if (!$student) {
        return redirect()->back()->with('error', 'Failure in update record')->withInput();
      }
      return redirect(url('crud/list'))->withSuccess('successfully updated');
    } catch (\Exception $e) {
      return back()->withError($e->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function delete($id)
  {
    $response = Student::where('id', $id)->delete();;
    if (!$response) {
      return back()->withWarning('Error in deletion');
    }
    return back()->withSuccess('Deleted successfully');
  }
  public function deleteAll(Request $request)
  {
    try {
      $paramsArray = $request->all();
      $users = Student::whereIn('id', $paramsArray['id'])->delete();
      $returnArray['success'] = "true";
      $returnArray['message'] = 'Deleted successfully';
    } catch (\Exception $e) {
      $returnArray['success'] = "false";
      $returnArray['message'] = $e->getMessage();
    }
    return response()->json($returnArray, 200);
  }

  public function updateStatus(Request $request)
  {
    try {
      $paramsArray = $request->all();
      $values = array('status' => $paramsArray['status']);
      Student::whereIn('id', $paramsArray['id'])->update($values);
      $retArr['success'] = "true";
      $retArr['message'] = 'Successfully Updated';
    } catch (\Exception $e) {
      $retArr['success'] = "false";
      $retArr['message'] = $e->getMessage();
    }
    return response()->json($retArr, 200);
  }
}
