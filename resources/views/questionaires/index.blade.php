@extends('layout.app')

@section('content')
<h1 class="font-bold">Evaluation System</h1>
<ul>
    @forelse ($questionaires as $questionaire )
        <li class="mb-4">
            <div class="text-sm rounded-md bg-white p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="w-full flex-grow sm:w-auto">
                        <a href="{{ route('questionaires.questions.index',$questionaire->id) }}" class="dtext-lg font-semibold text-slate-800 hover:text-slate-600">{{ $questionaire->title }}</a>
                        <span class="block text-slate-600">{{ $questionaire->description }}</span>
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