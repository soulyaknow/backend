@extends('layout.app')

@section('content')
{{-- {{ dd($question->criteria->questionaire[0]) }} --}}
{{-- {{ dd($question->ratings[0]->user) }} --}}
<h1 class="font-bold">{{ $question->criteria->questionaire[0]->title }}</h1>
<span class="block text-slate-600">{{ $question->criteria->questionaire[0]->description }}</span>
<span class="block text-slate-600 font-bold">Instructor: {{ $instructor->name }}</span>
<span class="block text-slate-600 font-bold">Question: {{ $question->question }}</span>

   <table class="w-full border-collapse border border-slate-400 max-w-xl mt-6 mx-auto">
       <thead class="bg-slate-400 text-white">
           <tr >
               <th colspan="3" class="py-2 px-4 text-left">Rating {{ request()->rating }}</th>
           </tr>
           <tr >
               <th class="py-2 px-4 text-left">ID Number</th>
               <th class="py-2 px-4 text-left">Name</th>
               <th class="py-2 px-4 text-left">department</th>
           </tr>
       </thead>
       <tbody>
            @foreach ($question->ratings as $key => $rating)
                <tr class="bg-white border-b border-slate-400 ">
                    <td class="py-2 px-4 ">{{ $key+1 }}. {{ $rating->user->id_number }}</td>
                    <td class="py-2 px-4">{{ $rating->user->name }}</td>
                    <td class="py-2 px-4">{{ $rating->user->department }}</td>
                </tr>
     
            @endforeach
              
       </tbody>
   </table>

@endsection