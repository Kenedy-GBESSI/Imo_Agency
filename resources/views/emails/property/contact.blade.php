<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande vers le bien <a href="{{ route('property.show',['slug' => $property->slug, 'property' => $property])}}">{{ $property->title }}</a>

-Prenom : {{ $data['firstname']}}<br>
-Nom : {{ $data['lastname']}}<br>
-Email : {{ $data['email']}}<br>
-Téléphone : {{ $data['phone']}}

** Message ** <br>
{{ $data['message'] }}

</x-mail::message>
