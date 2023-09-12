@extends('layout.app')

@section('content')
    <h1>{{ $questionaire->title }}</h1>
    <h2>{{ $questionaire->description }}</h2>
    <h1></h1>
    <h1 class="font-bold mb-5">{{ $instructor->name }}</h1>
    {{-- {{ dd($criterias) }} --}}
        <table class="w-full">
            @foreach ($questionaire->criterias as $key => $criteria)
            {{-- {{ dd($criteria->questions) }} --}}
                <thead class="border-b-2 border-gray-200">
                    <tr class="bg-gray-50">
                    <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">{{  $criteria->description }}</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                    @if ($key < 1)
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">NI</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">F</th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">S</th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">VS</th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">O</th>
                   
                    @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                  @foreach ($criteria->questions as $key =>$question)
                    {{-- {{ dd($criteria) }} --}}
                    <tr class="bg-white">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap"></td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $key+1}}. {{ $question->question }}</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $question->NI }}</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $question->F }}</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $question->S }}</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $question->VS }}</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $question->O }}</td>
                    </tr>
                  @endforeach
                </tbody>
            @endforeach
          
        </table>
   
    
@endsection