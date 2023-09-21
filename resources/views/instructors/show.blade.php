@extends('layout.app')

@section('content')
 
    {{-- {{ dd($criterias) }} --}}
        <table class="w-full">
            <caption class="caption-top"></caption>
                <h1 class="mb-3">{{ $questionaire->title }}</h1>
                <h2 class="mb-3">{{ $questionaire->description }}</h2>
                <h1 class="font-bold mb-5">Instructor: {{ $instructor->name }}</h1>
            </caption>
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
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Mean</th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">QD</th>
                    @else
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left"></th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left"></th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"></th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"></th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"></th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Mean</th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">QD</th>
                    @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                  @foreach ($criteria->questions as $key =>$question)
                       
                    <tr class="bg-white">
                        
                        <td colspan="2" class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $key+1}}. {{ $question->question }}</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <form action="{{ route('evaluation-form-question',[ $instructor->id,$question->id]) }}" method="GET">
                                <input type="hidden" name="questionaire_id" value="{{ $questionaire->id }}">
                                <input type="hidden" name="rating" value="1">
                                <button type="submit">{{ $question->NI }}</button>
                            </form>
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <form action="{{ route('evaluation-form-question',[ $instructor->id,$question->id]) }}" method="GET">
                                <input type="hidden" name="questionaire_id" value="{{ $questionaire->id }}">
                                <input type="hidden" name="rating" value="2">
                                <button type="submit">{{$question->F }}</button>
                            </form>
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <form action="{{ route('evaluation-form-question',[ $instructor->id,$question->id]) }}" method="GET">
                                <input type="hidden" name="questionaire_id" value="{{ $questionaire->id }}">
                                <input type="hidden" name="rating" value="3">
                                <button type="submit">{{$question->S }}</button>
                            </form>
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <form action="{{ route('evaluation-form-question',[ $instructor->id,$question->id]) }}" method="GET">
                                <input type="hidden" name="questionaire_id" value="{{ $questionaire->id }}">
                                <input type="hidden" name="rating" value="4">
                                <button type="submit">{{$question->VS }}</button>
                            </form>
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <form action="{{ route('evaluation-form-question',[ $instructor->id,$question->id]) }}" method="GET">
                                <input type="hidden" name="questionaire_id" value="{{ $questionaire->id }}">
                                <input type="hidden" name="rating" value="5">
                                <button type="submit">{{$question->O }}</button>
                            </form>
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap font-bold">{{round($question->ratings_avg_rating,2) }}</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap font-bold">{{ $question->mean['QD'] }}</td>
                    </tr>
                  @endforeach
                  <tr class="bg-white">
                    <td colspan="2" class="p-3 text-sm text-gray-700 whitespace-nowrap"></td>
                    
                    <td colspan="5" class="p-3 text-sm text-gray-700 whitespace-nowrap text-right font-bold">Total Mean</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap font-bold">TEST</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap font-bold">asd</td>
                </tr>
                </tbody>
            @endforeach
          
        </table>
   
    
@endsection