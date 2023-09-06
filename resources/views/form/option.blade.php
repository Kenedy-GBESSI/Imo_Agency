<form style="width: 100%" action="{{ $option->exists ? route('admin.option.update',$option) : route('admin.option.store')}}" method="post">
    @csrf
    @method($option->exists ?  'PUT' : 'POST')
    <div class="row">
        <div class="col-sm-9 col-12">
            <div class="row mb-2">

                <div class="col-sm-6 col-12">

                    @include('shared.input',['label' => 'Nom','name'=>'name','type' => 'text','value' => $option->name])

                </div>

            </div>
        </div>

    </div>
    <button class="btn btn-primary">{{ $option->exists ? 'Modifier' : 'Ajouter' }}</button>
</form>
