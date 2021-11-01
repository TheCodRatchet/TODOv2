<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('tasks.create') }}">Create new task</a>
                    @foreach($tasks as $task)
                        <ul class="list-disc">
                            <li>
                                <h4>{{ $task->title }}</h4>
                                <p>
                                    {{ $task->content }}
                                </p>
                                <div style="display: inline">
                                    <a href="{{ route('tasks.edit', $task) }}">EDIT</a>
                                    <form method="post" action="{{ route('tasks.destroy', $task) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="confirm('Are You sure?')">DELETE</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
