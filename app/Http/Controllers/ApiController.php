<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public function store(Request $request)
    {
        $device = Device::create([
            'name' => $request->name,
            'company' => $request->company,
            'price' => $request->price,
        ]);
        if ($device) {
            return success_response('Data inserted', $device);
        } else {
            return success_response('Operation failed ', $device);
        }
    }

    public function list($id = null)
    {
        $device = $id ? Device::find($id) : Device::all();
        if ($device) {
            return $id ? Device::find($id) : Device::all();
        } else {
            return ("No result found of that given ID");
        }
    }

    public function update(Request $request, $id)
    {
        $device = Device::find($id);
        $device->update([
            'name' => $request->name,
            'company' => $request->company,
            'price' => $request->price,
        ]);
        if ($device) {
            return success_response('Data Updated', $device);
        } else {
            return success_response('Operation failed ', $device);
        }
    }

    public function destroy($id)
    {
        $device = Device::find($id);
        $device->delete();
        if ($device) {
            return success_response('Data Deleted', $device);
        } else {
            return ("No result found of that given ID");
        }
    }

    public function search($name)
    {
        $count = Device::where('name', 'like', '%' . $name . '%')->count();
        if ($count > 0) {
            return Device::where('name', 'like', '%' . $name . '%')->get();
        } else {
            return ("No result found");
        }
    }

    public function validation(Request $request)
    {
        $rules = array(
            'name' => 'required | min:4',
            'company' => 'required',
            'price' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $device = Device::create([
                'name' => $request->name,
                'company' => $request->company,
                'price' => $request->price,
            ]);
            if ($device) {
                return success_response('Data inserted', $device);
            } else {
                return success_response('Operation failed ', $device);
            }
        }
    }
}
