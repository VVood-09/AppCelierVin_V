
@foreach($bouteilles as $bouteille)
  <div>{{$bouteille->nom}}</div>
  <div>{{$bouteille->format}}</div>
  <div>{{$bouteille->description}}</div>
  @endforeach