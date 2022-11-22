<?php

namespace App\Http\Controllers\API;

use App\Models\Vfi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class VFIController extends Controller
{
    public function index (Request $request)
    {
        $vfis = Vfi::all();
        return response()->json([
            'status'=> 200,
            'vfis'=>$vfis,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
        //    'TelNo' => 'required|regex:/(0)[0-9]{9}/',
           'LengthofMembershipinVFi'=> 'required|integer',
           'firstName'=> 'required|unique:vfis| |min:2',
           'secondName'=> 'required|unique:vfis| |min:2',
           'Email'=> 'required|unique:vfis| |email',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=> 422,
                'validate_err'=> $validator->messages(),
            ]);
        }
        else
        {
           
        $vfi = new Vfi() ;
        $vfi->Gender = $request->input('Gender') ;
        $vfi->firstName = $request->input('firstName') ;
        $vfi->secondName = $request->input('secondName') ;
        $vfi->MaritalStatus = $request->input('MaritalStatus') ;
        $vfi->TelNo= $request->input('TelNo') ;
        $vfi->TownofResidence = $request->input('TownofResidence') ;
        $vfi->Fellowshipifattendingany = $request->input('Fellowshipifattendingany') ;
        $vfi->MinistryInvolvedin= $request->input('MinistryInvolvedin') ;
        $vfi->ChurchYouattend = $request->input('ChurchYouattend') ;
        $vfi->Profession = $request->input('Profession') ;
        $vfi->LengthofMembershipinVFi = $request->input('LengthofMembershipinVFi') ;
        $vfi->Email = $request->input('Email') ;
        $vfi->save();

            return response()->json([
                'status'=> 200,
                'message'=>'Thank you for your response!',
            ]);
        }

    }

    public function edit($id)
    {
        $vfi = Vfi::find($id);
        if($vfi)
        {
            return response()->json([
                'status'=> 200,
                'vfi' => $vfi,
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 404,
                'message' => 'No vfi ID Found',
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
        // 'TelNo' => 'required|regex:/(0)[0-9]{9}/',
        'LengthofMembershipinVFi'=> 'required|integer',
        // 'firstName'=> 'required|unique:vfis| |min:2',
        // 'secondName'=> 'required|unique:vfis| |min:2',
        'Email'=> 'required|email',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=> 422,
                'validationErrors'=> $validator->messages(),
            ]);
        }
        else
        {
            $vfi = Vfi::find($id);
            if($vfi)
            {

                
        $vfi = Vfi::find($id);
        $vfi->Gender = $request->input('Gender') ;
        $vfi->firstName = $request->input('firstName') ;
        $vfi->secondName = $request->input('secondName') ;
        $vfi->MaritalStatus = $request->input('MaritalStatus') ;
        $vfi->TelNo= $request->input('TelNo') ;
        $vfi->TownofResidence = $request->input('TownofResidence') ;
        $vfi->Fellowshipifattendingany = $request->input('Fellowshipifattendingany') ;
        $vfi->MinistryInvolvedin= $request->input('MinistryInvolvedin') ;
        $vfi->ChurchYouattend = $request->input('ChurchYouattend') ;
        $vfi->Profession = $request->input('Profession') ;
        $vfi->LengthofMembershipinVFi = $request->input('LengthofMembershipinVFi') ;
        $vfi->Email = $request->input('Email') ;
        $vfi->save();

                return response()->json([
                    'status'=> 200,
                    'message'=>'Updated Successfully',
                ]);
            }
            else
            {
                return response()->json([
                    'status'=> 404,
                    'message' => 'No Vfi ID Found',
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $vfi = Vfi::find($id);
        if($vfi)
        {
            $vfi->delete();
            return response()->json([
                'status'=> 200,
                'message'=>'Vfi Deleted Successfully',
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 404,
                'message' => 'No Vfi ID Found',
            ]);
        }
    }
}
