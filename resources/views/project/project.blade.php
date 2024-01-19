<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$project->name}}
        </h2>
        <h3 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Project
            Leader: {{$project->project_lead}}</h3>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="my-5 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 overflow-hidden shadow-sm lg:p-4">
            <h2 class="font-bold">Project description:</h2>
            {{$project->description}}
            <hr class="my-2 dark:border-white border-black">
            <h2 class="font-bold">Project members:</h2>
            <ul class="list-inside list-disc">
            @foreach($project->project_team as $member)
                <li>{{$member->team_member}}</li>
            @endforeach
            </ul>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-6 ml-3 text-2xl font-bold text-neutral-700 dark:text-neutral-300">
                Milestones
            </h3>

            <ol class="border-l-2 border-l-info-600">
                <!--First item-->
                @foreach($project->milestones as $milestone)
                <li>
                    <div class="flex-start md:flex">
                        <div class="-ml-[13px] flex h-[25px] w-[25px] items-center justify-center rounded-full bg-black dark:bg-white text-white dark:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                                <path fill-rule="evenodd"
                                        d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                                        clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="mb-10 ml-6 block max-w-md rounded-lg p-6 shadow-md shadow-black/5 bg-white dark:bg-gray-800 dark:shadow-black/10">
                            <div class="mb-4 flex justify-between">
                                <a href="#"
                                        class="text-sm text-info transition duration-150 ease-in-out hover:text-info-600 focus:text-info-600"
                                >{{$milestone->name}}</a>
                                <a href="#"
                                        class="text-sm text-info transition duration-150 ease-in-out hover:text-info-600 focus:text-info-600">End date:
                                    {{$milestone->end}}</a>
                            </div>
                            <p class="mb-6 text-neutral-700 dark:text-neutral-200">
                                    {{$milestone->description}}
                            </p>
                            <div class="mb-4 flex justify-between">
                                <button type="button"
                                        class="inline-block rounded bg-info px-4 pb-[5px] pt-[6px] text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out">
                                    Comment
                                </button>
                            </div>

                        </div>
                    </div>
                </li>
                    @endforeach
            </ol>
        </div>
    </div>


</x-app-layout>
