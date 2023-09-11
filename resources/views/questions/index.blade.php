@extends('layout.app')

@section('content')

 <h1 class="font-bold">{{ $questionaire->title }}</h1>
 <span class="block text-slate-600">{{ $questionaire->description }}</span>
   @foreach ($questionaire->criterias as $criteria)
    <table class="w-full border-collapse border border-slate-400 max-w-xl mt-6 mx-auto">
        <thead>
            <tr class="bg-slate-400 text-white">
                <th class="py-2 px-4 text-left">{{ $criteria->description }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($criteria->questions as $key => $question)
                <tr class="bg-white border-b border-slate-400">
                    <td class="py-2 px-10">{{ $key + 1 }}. {{ $question->question }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
   @endforeach
@endsection