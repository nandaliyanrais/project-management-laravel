@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold">Projects</h1>
            <a href="{{ route('projects.create') }}">
                <svg class="w-4 h-4 mr-2" viewBox="0 0 20 20" fill="black">
                    <path fill-rule="evenodd" d="M13 7h-2V5c0-.6-.4-1-1-1s-1 .4-1 1v2H7c-.6 0-1 .4-1 1s.4 1 1 1h2v2c0 .6.4 1 1 1s1-.4 1-1v-2h2c.6 0 1-.4 1-1s-.4-1-1-1zM8 1c-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm0 10c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z" clip-rule="evenodd"/>
                </svg>
                Create Project
            </a>
        </div>
        
        @if($projects->isEmpty())
            <p class="text-gray-500">No projects found.</p>
        @else
            <ul class="divide-y divide-gray-200">
                @foreach($projects as $project)
                    <li class="py-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="text-lg font-semibold">{{ $project->title }}</h2>
                                <p class="text-gray-500">Created at: {{ $project->created_at->format('Y-m-d') }}</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-500 hover:text-blue-600 font-semibold inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M15.293 3.293a1 1 0 00-1.414 0L5 12.586V15a1 1 0 001 1h2.414l9.293-9.293a1 1 0 000-1.414l-2-2zM6 14v-2.586L13.586 4H15v1.414L7.414 14H6zm-2.707-.293A1 1 0 004 15h1.586l9.707-9.707-1.293-1.293L2.293 13.707z" clip-rule="evenodd" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 font-semibold inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 4.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 11-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
