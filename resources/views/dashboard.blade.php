<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($projects as $project)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex">
                            <h1 class="flex-auto text-xl">{{$project->name}}</h1>
                            <a  href="{{route("project-single",['id'=>$project->id])}}" class="text-end flex-auto text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out">
                                Open
                            </a>
                        </div>
                        <div class="flex items-center">
                            <span>Project Leader: {{$project->project_lead}}</span>
                            <h3 class="text-lg font-bold">{{$project->description}}</h3>
                        </div>

                    </div>
                    @foreach($project->activities as $activity)

                        <div class="my-2 max-w-5xl sm:px-4 lg:px-6 bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100 flex">
                            <h1 class="flex-1 ">{{$activity->name}}</h1> <button
                                    class="text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out"
                                    type="button"
                                    data-te-collapse-init
                                    data-te-ripple-init
                                    data-te-ripple-color="dark"
                                    data-te-target="#{{$project->name}}-activity-{{$activity->id}}"
                                    aria-expanded="false"
                                    aria-controls="{{$project->name}}-activity-{{$activity->id}}">
                                    Collapse
                                </button>

                            </div>
                            <div class="!visible hidden" id="{{$project->name}}-activity-{{$activity->id}}" data-te-collapse-item>
                                <div class="my-2 bg-gray-200 p-4 sm:rounded-lg ">
                                    <ul class="flex my-2 ">
                                        <li class="flex-auto text-center">Activity Start:  {{$activity->start}}</li>
                                        <li class="flex-auto text-center">Activity End:  {{$activity->end}}</li>
                                    </ul>
                                    <hr class="border-black">
                                    {{$activity->description}}
                                 </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
