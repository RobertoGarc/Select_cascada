<!DOCTYPE html>
<html lang="es">
@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="mundo" method="post" id="mundo" name="mundo">
        @csrf
            <div class="form-group">
                <label for="continentes">Seleccione un continente</label>
                <select name="continentes" id="continentes" class="select form-control">

                <option value="0">Elegir</option>
                @foreach($continentes as $continente)

                <option value={{$continente->id_continente}}>{{$continente->nombre_continente}}</option>

                @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="paises">Seleccione un país</label>
                <select name="paises" id="paises" class="select form-control" disabled>
            </div>
        </form>
    </div>
<script>
    
        
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('continentes').addEventListener('change',(e)=>{
        fetch('paises',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Elegir</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id_pais+'">'+data.lista[i].nombre_pais+'</option>';
            }
            document.getElementById("paises").removeAttribute('disabled')
            document.getElementById("paises").innerHTML = opciones;
            
        }).catch(error =>console.error(error));
    });

   
  
</script>

@endsection