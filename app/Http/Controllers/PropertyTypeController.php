<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PropertyTypeController extends Controller
{
    public function propertyTypeManage(){
        $propertyType = PropertyType::latest()->get();
        return view('admin.property-type.manage',['propertyTypes' => $propertyType]);
    }

    public function propertyTypeAdd(){
        return view('admin.property-type.add');
    }

    public function propertyTypeStore(Request $request){
        $request->validate([
            'property_type_name' => 'required|unique:property_types,property_type_name',
            'property_type_icon' => 'required'
        ]);

        $propertyType = new PropertyType();
        $propertyType->property_type_name = $request->property_type_name;
        $propertyType->property_type_icon = $request->property_type_icon;
        $propertyType->save();

        $notification = [
            'message'    => 'Property type is added successfully',
            'alert-type' => 'success'
        ]; 

        return back()->with($notification);
    } 

    public function propertyTypeEdit($id){
        return view('admin.property-type.edit',['propertyType' => PropertyType::find($id)]);
    }

    public function propertyTypeUpdate(Request $request, $id){
        $request->validate([
            'property_type_name' => 'required|unique:property_types,property_type_name',
            'property_type_icon' => 'required'
        ]);
      
        $propertyType = PropertyType::find($id);
        $propertyType->property_type_name = $request->property_type_name;
        $propertyType->property_type_icon = $request->property_type_icon;
        $propertyType->save();

        $notification = [
            'message'    => 'Property type is Updated successfully',
            'alert-type' => 'success'
        ];
        return redirect(route('propertyType.manage'))->with($notification); 
    }

    public function propertyTypeDelete($id){
        $propertyType = PropertyType::find($id);
        $propertyType->delete();

        $notification = [
            'message'    => 'Property type is Delete successfully',
            'alert-type' => 'success'
        ];
        return redirect(route('propertyType.manage'))->with($notification); 
        
    }
}
