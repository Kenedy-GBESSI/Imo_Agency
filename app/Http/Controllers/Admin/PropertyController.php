<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Image;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;


class PropertyController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(Property::class,'property');
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {

      //   dd(User::orderBy('created_at','desc')->get());

      // Use of scope
      //   dd(User::admin()->get());


      return view('admin.properties.index',[
        'properties' => Property::recent()->withTrashed()->paginate(25)
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $property = new Property();
        $options = Option::pluck('name','id');

        // $property->fill([ ]) c'est utilisé pour prédefinir aussi les valeurs de property;
        return view('admin.properties.create',[
            'property' => $property,
            'options' => $options
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {

        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));

        $this->addFiles($request->validated('images'),$property);

        return $this->redirectNext('admin.property.index',[
            'statut' => 'success',
            'value' => 'Le bien a bien été créé'
        ]);
    }

    private function addFiles(array $images, Property $property){


       $files = [];

        // dd('hello');
        if($property->images()){

           $property->images()->delete();
           Storage::disk('public')->deleteDirectory('properties/'.$property->id);
        };

        foreach ($images as $image) {

            if($image === null || $image->getError()){
               continue;
            }
            $path = $image->store('properties/'.$property->id,'public');

            $files[] = [
                'path' => $path
            ];

        }

        if(count($files) > 0){
           $property->images()->createMany($files);
        }

    }


    public function deleteFile(Image $image){
        Storage::disk('public')->delete($image->path);
        $image->delete();
        return back()->with('success','Supprimé avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $options = Option::pluck('name','id');
        return view('admin.properties.create',[
            'property' => $property,
            'options' => $options
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {

        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        // dd($request->validated('images'));
        $this->addFiles($request->validated('images'),$property);

        return $this->redirectNext('admin.property.index',[
            'statut' => 'success',
            'value' => 'Le bien a bien été modifié'
        ]);
    }

    private function redirectNext(string $route, array $message){
        if($message){
            return to_route($route)->with($message['statut'],$message['value']);
        }
        return to_route($route);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $property)
    {

        $propertyWithTrashed = Property::withTrashed()->where('id','=',$property)->first();


        // dd($propertyWithTrashed->trashed());

        if($propertyWithTrashed->trashed()){
            $propertyWithTrashed->images()->delete();
            Storage::disk('public')->deleteDirectory('properties/'.$property);
            $propertyWithTrashed->forceDelete();
        }else{
          $propertyWithTrashed->delete();
        }

        return $this->redirectNext('admin.property.index',[
            'statut' => 'success',
            'value' => 'Le bien a bien été supprimé'
        ]);

    }

    public function restoreProperty(string $id){
        Property::withTrashed()->where('id','=',$id)->restore();
        return $this->redirectNext('admin.property.index',[
             'statut' => 'success',
             'value' => 'Le bien a bien été restoré'
        ]);
    }
}
