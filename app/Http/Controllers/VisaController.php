<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Visa;
use Illuminate\Http\Request;
use Auth;


class VisaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
         $visas=Visa::all();
    return view('visas.index')->with('visas',$visas);
    }

    public function VisaTrashed()
    {

        $visas=Visa::onlyTrashed()->get();
    return view('visas.trashed')->with('visas',$visas);
        //
    }


    public function create()
    {
        return view('visas.create');
    }



    public function store(Request $request)
    {
       $this->validate($request,[
            'Country_TO'=>'required',
            'Cutomer_name'=>'required',
            'Visa_type'=>'required',
            'Issue_Date'=>'required',
            'Departure_at'=>'required',
            'photo'=>'required | image',

       ]);

       $photo=$request->photo;
       $newPhoto=time().$photo->getClientOriginalName();
       $photo->move('upload/visa',$newPhoto);
       $visa=Visa::create([
        'user_id'=>Auth::id(),
        'Country_TO'=>$request->Country_TO,
        'Cutomer_name'=>$request->Cutomer_name,
        'Visa_type' => $request->Visa_type,
        'Issue_Date'=>$request->Issue_Date,
        'Departure_at'=>$request->Departure_at,
        'photo'=>'upload/visa/'.$newPhoto,
        'slug'=>Str::slug($request->Cutomer_name),
    ]);
        return redirect()->back();
    }


    public function show($slug)
    {


     $visa=Visa::where('slug',$slug)->first();
     return view('visas.show')->with('visa',$visa);
    }

    public function edit($id)
    {

     $visa=Visa::find($id);
     return view('visas.edite')->with('visa',$visa);
    }


    public function update(Request $request, $id)
    {

     $visa=Visa::find($id);

       $this->validate($request,[
        'Country_TO'=>'required',
        'Cutomer_name'=>'required',
        'Visa_type'=>'required',
        'Issue_Date'=>'required',
        'Departure_at'=>'required',
        'photo'=>'required | image'

   ]);

   if($request->has('photo')){

    $photo=$request->photo;
    $newPhoto=time().$photo->getClientOriginalName();
    $photo->move('upload/visa',$newPhoto);
    $visa->photo='upload/visa/'.$newPhoto;
   }

   $visa->Cutomer_name=$request->Cutomer_name;
   $visa->Country_TO=$request->Country_TO;
   $visa->Visa_type=$request->Visa_type;
   $visa->Issue_Date=$request->Issue_Date;
   $visa->Departure_at=$request->Departure_at;
   $visa->save();

   return redirect()->back();
    }


    public function destroy( $id)
    {

        $visa=Visa::find($id);
        $visa->delete();
        return redirect()->back();

    }
    public function hdelete( $id)
    {

        $visa=Visa::withTrashed()->where('id', $id)->first();
        $visa->forceDelete();
        return redirect()->back();
    }
    public function restore( $id)
    {
        $visa=Visa::withTrashed()->where('id', $id)->first();
        $visa->restore();
        return redirect()->back();
    }
}
