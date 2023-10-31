@extends('layout.app')
@section('content')
{{-- {{dd($instructors->evaluatees )}} --}}
<h1 class="font-bold">Instructors</h1>
<ul>
    @forelse ($instructors->evaluatees as $instructor )
        <li class="mb-4">
            <div class="text-sm rounded-md bg-white p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="w-full flex-grow sm:w-auto">
                        <a href="{{ route('evaluation-form',$instructor->id) }}" class="dtext-lg font-semibold text-slate-800 hover:text-slate-600">{{$instructor->id}} {{ $instructor->name }}</a>
                        {{-- <span class="block text-slate-600">{{ $questionaire->description }}</span> --}}
                    </div>
                </div>
            </div>
        </li>
    @empty
        <li class="mb-4">
            <div class="text-sm rounded-md bg-white py-10 px-4 text-center leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                <p class="font-medium text-slate-500">No data found</p>
            </div>
        </li>
    @endforelse
</ul>
@endsection
