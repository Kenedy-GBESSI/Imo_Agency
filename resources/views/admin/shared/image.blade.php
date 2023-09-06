<div class="row my-2">
    @foreach ($property->images as $image)
      <div class="col-6">
     <div class="card" style="width: 18rem;">
         <img src="{{ $property->getUrl($image->path) }}" class="card-img-top" alt="...">
         <form id="{{'form-dynamic'.$image->id}}" action="{{route('admin.image.delete',$image)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger w-100">Supprimer</button>
         </form>
       </div>
    </div>
   @endforeach
  </div>





