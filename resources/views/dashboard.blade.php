<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($projects as $project)
                <div class="my-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex">
                            <h1 class="flex-auto text-xl">{{$project->id}} - {{$project->name}}</h1>
                            <div>
                                <a href="{{route("project.single",['id'=>$project->id])}}"
                                   class="text-end flex-auto text-xs font-medium uppercase leading-normal dark:text-white transition duration-150 ease-in-out">
                                    Open
                                </a>
                                @if($project->user_id == Auth::id())

                                    <a href="{{route("project.edit",['id'=>$project->id])}}"
                                        class="text-end flex-auto text-xs font-medium uppercase leading-normal text-blue-800 dark:text-blue-300 transition duration-150 ease-in-out">
                                        Edit
                                    </a>

                                    <form action="{{ route('project.delete', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-end flex-auto text-xs font-medium uppercase leading-normal dark:text-red-700 transition duration-150 ease-in-out">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div>
                            <h5><b>Project Leader: {{$project->project_lead}}</b></h5>
                            <p class="mt-5">{{$project->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-app-layout>
