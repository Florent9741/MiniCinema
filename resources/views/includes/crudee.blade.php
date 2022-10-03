@extends('layouts.app')
@section('main')

<section class="mt-6 text-black bg-gray-200 rounded-lg body-font">
    <div class="container px-5 py-10 mx-auto ">
        <div class="flex flex-col w-full mb-20 text-center ">
            <h1 class="pb-4 mb-2 text-3xl font-medium sm:text-4xl title-font">Liste des Utilisateurs</h1>

            <table class="object-center whitespace-no-wrap bg-gray-100 table-auto">
                @include('includes.ajouter')
                @if (session('success'))
                    <div class="alert alert-success">
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">      
                            @include('includes.success')
                            </div>
                        </div>
                    </div>
                    @elseif (session('deleted'))
                    <div class="alert alert-deleted">
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">      
                            @include('includes.deleted')
                            </div>
                        </div>
                    </div>
                @endif
                
                <thead>
                    <tr
                        class="px-4 py-3 text-sm font-medium tracking-wider text-white rounded-b title-font bg-slate-600">
                        <th class="px-5 py-3 border-2 ">Nom</th>
                        <th class="px-5 py-3 border-2 ">Prenom</th>
                        <th class="px-5 py-3 border-2 ">email</th>
                        <th class="px-5 py-3 border-2 ">Roles</th>
                       
                        <th class="px-5 py-3 border-2 ">Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr class="tborder">
                            <td class="px-4 py-3 border-2 "><a
                                    href="/film/{{ $film['id_film'] }}">{{ $film['titre'] }}</a></td>
                            <td class="px-4 py-3 border-2"><img class="rounded-lg w-80"
                                    src="{{ Storage::url($film->image) }}"> </td>
                            <td class="px-4 py-3 border-2 "><a class="resume">{{ $film->resume }}</a></td>
                            <td class="px-4 py-3 border-2">
                            @foreach ($film->categories as $categorie)
                           <a>{{ $categorie->genre }}</a>
                            @endforeach
                        </td>
                          
                            <td class="px-4 py-3 border-2">@include('includes.update')
                                @include('includes.delete')
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection