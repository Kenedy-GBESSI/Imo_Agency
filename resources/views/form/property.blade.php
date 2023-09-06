<form style="width: 100%" action="{{ $property->exists ? route('admin.property.update',$property) : route('admin.property.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method($property->exists ?  'PUT' : 'POST')
    <div class="row">
        <div class="col-sm-9 col-12">

            <div class="row mb-2">

                <div class="col-sm-6 col-12">

                    @include('shared.input',['label' => 'Titre','name'=>'title','type' => 'text','value' => $property->title])

                </div>

                <div class="col-sm-3 col-12">

                    @include('shared.input',['label' => 'Surface','name'=>'air_layer','type' => 'number','value' => $property->air_layer])

                </div>

                <div class="col-sm-3 col-12">

                    @include('shared.input',['label' => 'Prix','name'=>'price','type' => 'number','value' => $property->price])

                </div>

            </div>

            <div class="row mb-2">
                <div class="col-12">
                    @include('shared.input',['label' => 'Description','name'=>'description','type' => 'textarea','value' => $property->description])

                </div>
            </div>


            <div class="row mb-2">

                <div class="col-sm-4 col-12">

                    @include('shared.input',['label' => 'Pièces','name'=>'bedroom','type' => 'number','value' => $property->bedroom])

                </div>

                <div class="col-sm-4 col-12">

                    @include('shared.input',['label' => 'Chambres','name'=>'rooms_num','type' => 'number','value' => $property->rooms_num])



                </div>

                <div class="col-sm-4 col-12">

                    @include('shared.input',['label' => 'Etage','name'=>'floor','type' => 'number','value' => $property->floor])


                </div>

            </div>

            <div class="row mb-2">

                <div class="col-sm-4 col-12">
                    @include('shared.input',['label' => 'Adresse','name'=>'address','type' => 'text','value' => $property->address])

                </div>

                <div class="col-sm-4 col-12">

                    @include('shared.input',['label' => 'Ville','name'=>'city','type' => 'text','value' => $property->city])



                </div>

                <div class="col-sm-4 col-12">

                    @include('shared.input',['label' => 'Code Postal','name'=>'postal_code','type' => 'text','value' => $property->postal_code])

                </div>

            </div>

            <div class="row mb-2">
                <div class="col-12">
                    @include('shared.select',['label' => 'Options','name'=>'options','value' => $property->options()->pluck('id')])
                </div>
            </div>


        </div>
        <div class="col-sm-3 col-12">

            <div class="row mb-2">
                <div class="col-12 d-flex justify-content-end">
                    @include('shared.image',['name' => 'images', 'label' => 'Images'])
                </div>
                <div class="col-12 d-flex justify-content-start">
                    @include('shared.checkbox',['label' => 'Vendu ?', 'name' => 'sold', 'value' => $property->sold])
                </div>
             </div>


        </div>
    </div>
    <button class="btn btn-primary">{{ $property->exists ? 'Modifier' : 'Ajouter' }}</button>
</form>
@include('admin.shared.image')

