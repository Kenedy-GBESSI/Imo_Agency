<?php

namespace App\Http\Controllers;

use App\Events\ContactEvent;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    public function index(FilterRequest $request){

        $query = Property::query()->with('images');
        if($title = $request->validated('title')){
            $query->where('title','LIKE',"%{$title}%");
        }
        if($surface = $request->validated('surface')){
            $query->where('air_layer','>=',$surface);
        }
        if($bedrooms = $request->validated('bedrooms')){
            $query->where('bedroom','>=',$bedrooms);
        }
        if($price = $request->validated('price')){
            $query->where('price','<=',$price);
        }


        return view('property.index',
        [
            'properties' => $query->recent()->available(true)->paginate(25),
            'input' => $request->validated()
        ]
    );
    }

    public function show(string $slug, Property $property){
        if($slug !== $property->slug){
            return to_route('property.show',['slug' => $property->slug,'property' => $property]);
        }
        return view('property.show',[
            'property' => $property
        ]);

    }

    public function contact (PropertyContactRequest $request, Property $property){

        // Mail::send( new PropertyContactMail($property,$request->validated()) );
        // event(new ContactEvent($property,$request->validated()));pour faire ceci , exactement on peut utiliser le code suivant:
        ContactEvent::dispatch($property,$request->validated()); // or dispatchIf when we have a condition

        return back()->with('success', 'Email, bien envoyée');
    }
}
