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
                    @foreach($tasks as $task)
                        <ul>
                            <li>
                                <h4>{{ $task->title }}</h4>
                                <p>
                                    {{ $task->content }}
                                </p>
                                <p>
                                    <a href="{{ route('tasks.edit', $task) }}">EDIT</a>
                                <form method="post" action="{{ route('tasks.destroy', $task) }}">
                                    <button type="submit" onclick="confirm('Are You sure?')">DELETE</button>
                                </form>
                                </p>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
