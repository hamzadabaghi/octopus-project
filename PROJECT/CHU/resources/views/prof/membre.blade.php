@extends('layouts.prof')

@section('membre')
class="active"
@endsection

@section('num')
@if($num > 0)
    {{ $num }}
@endif
@endsection

@section('profile')
{{ $user->image }} 
@endsection

@section('nomComplet')
{{ $user->name }} {{ $user->prenom }}
@endsection

@section('specialite')
{{ $user->specialite }}
@endsection

@section('content')
<!--notice-->
<div class="container">
    <div class="notice notice-success">
      <strong>Gestion des Membres</strong>
    </div>
</div>

<!--end notice-->

 <!--team-->

    @if(session('message'))
      <div class="flag note note--success">
        <div class="flag__image note__icon">
          <i class="fa fa-check"></i>
        </div>
        <div class="flag__body note__text">
          {{ session('message') }}
        </div>
        <a href="#" class="note__close">
          <i class="fa fa-times"></i>
        </a>
      </div>
    @endif

 

 <div>
 <p
 style="text-align
   : center;
   margin-top:30px;margin-bottom: 30px;"
>
 <a
   class="btn  btn-primary"
   href="{{ route("addMembre1") }}"
   style="border-radius: 20px;"
 >
   <i style="margin-right:1px;" class="fas fa-user-plus"></i>
   Ajouter
 </a>
</p>
 </div>

<!---->
<div class="row justify-content-center">
 
  @foreach ($users as $prof)
    <div class="membre">
        <img src="/storage/images/{{ $prof->image }}"/>
        <div class="libele">
          <h3>{{ $prof->name }} {{ $prof->prenom }}</h3>
          <p class="title">{{ $prof->specialite }}</p>
        </div>
    </div>     
  @endforeach
   

   

   

   
 </div>
</div>
<!--end team-->
@endsection
