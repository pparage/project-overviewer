<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Project - <span id="header_project_name">{{$project->name}}</span>
        </h2>
    </x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-5 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 overflow-hidden shadow-sm lg:p-6">
            <form id="form-edit" method="post" action="/project/store" data-te-validation-init>
                @csrf
                <input hidden type="number" name="project_id" id="project_id" value="{{$project->id}}">
                <div class="relative mb-3" data-te-input-wrapper-init data-te-input-form-white="true"
                     data-te-validate="input" data-te-validation-ruleset="isRequired">
                    <input
                        type="text"
                        class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="project_name" name="project_name" value="{{ $project->name }}"
                        placeholder="Project Name"/>
                    <label
                        for="project_name"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-white"
                    >Project Name
                    </label>
                </div>
                <div class="relative mb-3" data-te-input-wrapper-init data-te-input-form-white="true">
                <textarea
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="project_description" name="project_description"
                    rows="4"
                    placeholder="Your message">{{ $project->description }}</textarea>
                    <label
                        for="project_description"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-white"
                    >Project Description
                    </label>
                </div>
                <div class="relative mb-3" data-te-input-wrapper-init data-te-input-form-white="true"
                     data-te-validate="input" data-te-validation-ruleset="isRequired">
                    <input name="project_lead"
                           type="text"
                           class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                           id="project_name" value="{{ $project->project_lead }}"
                           placeholder="Project Leader"/>
                    <label
                        for="project_leader"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-white"
                    >Project Leader
                    </label>
                </div>


                <div id="teamMembers" class="relative mb-3">

                    <label class="mb-2"
                        for="project_team">Project Team
                    </label>
                    @foreach ($project->project_team as $member)
                        <span class="p-1 bg-blue-100 text-blue-800 rounded mx-1 relative">{{$member->team_member}}<span class="delete-icon font-bold hover:text-red-600" style="cursor: pointer;"> X</span></span>
                    @endforeach
                    <input type="text" id="memberInput" placeholder="Add team member..."
                           class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    >

                </div>
                <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init data-te-validate="input"
                     data-te-validation-ruleset="isRequired"
                     data-te-input-form-white="true">
                    <input id="project_start" name="project_start"
                           type="text" value="{{ $project->start }}"
                           class="peer block min-h-[auto] w-full rounded border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                           placeholder="Select the start date"/>
                    <label
                        for="floatingInput"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-white"
                    >Select the start date</label>
                </div>
                <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init
                     data-te-input-form-white="true">
                    <input id="project_end" name="project_end"
                           type="text" value="{{ $project->end }}"
                           class="peer block min-h-[auto] w-full rounded border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                           placeholder="Select the end date"/>
                    <label
                        for="project_end"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-white"
                    >Select the end date</label>
                </div>
                <input
                    type="submit" id="submit" name="submit"
                    class="inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    value="Save"/>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const teamMembersDiv = document.getElementById('teamMembers');

            // Function to create a member span
            function createMemberSpan(name) {
                const memberSpan = document.createElement('span');
                memberSpan.className = 'p-1 bg-blue-100 text-blue-800 rounded mx-1 relative';

                // Add the member name
                const textNode = document.createTextNode(name);
                memberSpan.appendChild(textNode);

                // Add the delete icon
                const deleteIcon = document.createElement('span');
                deleteIcon.textContent = ' X';
                deleteIcon.className = 'delete-icon font-bold hover:text-red-600';
                deleteIcon.style.cursor = 'pointer';
                memberSpan.appendChild(deleteIcon);

                return memberSpan;
            }

            // Event listener for adding members
            const inputField = document.getElementById('memberInput');
            inputField.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    const name = inputField.value.trim();
                    if (name) {
                        const memberSpan = createMemberSpan(name);
                        teamMembersDiv.insertBefore(memberSpan, inputField);
                        inputField.value = '';
                    }
                    event.preventDefault();
                }
            });

            // Event delegation for delete icons
            teamMembersDiv.addEventListener('click', (event) => {
                if (event.target.className === 'delete-icon font-bold hover:text-red-600') {
                    event.target.parentElement.remove();
                }
            });

            // Form submit logic
            const formEdit = document.getElementById('form-edit');
            formEdit.addEventListener('submit', (submitEvent) => {
                const memberSpans = document.querySelectorAll('#teamMembers span:not(.delete-icon)');
                const names = Array.from(memberSpans).map(span => span.firstChild.textContent.trim());

                // Clear any previously added hidden inputs
                document.querySelectorAll('[name="project_member[]"]').forEach(el => el.remove());

                // Create hidden inputs for each name and append them to the form
                names.forEach(name => {
                    const input = document.createElement('input');
                    input.name = 'project_member[]';
                    input.type = 'hidden'; // Make sure the input is hidden
                    input.value = name;
                    formEdit.appendChild(input);
                });
            });
        });




        document.addEventListener('DOMContentLoaded', function () {
            // Select the parent element by its ID

            const form = document.getElementById('form-edit'); // Replace with your form's ID
            form.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    return false;
                }
            });
        });
    </script>


</x-app-layout>
