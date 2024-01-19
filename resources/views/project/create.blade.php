<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create new Milestone - <span id="header_project_name"></span>
        </h2>
    </x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-5 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 overflow-hidden shadow-sm lg:p-6">
            <form method="post" action="/project/store" data-te-validation-init>
                @csrf
                <div class="relative mb-3" data-te-input-wrapper-init data-te-input-form-white="true"
                     data-te-validate="input" data-te-validation-ruleset="isRequired">
                    <input
                        type="text"
                        class="peer block min-h-[auto] w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="project_name" name="project_name"
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
                    placeholder="Your message"></textarea>
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
                           id="project_name"
                           placeholder="Project Leader"/>
                    <label
                        for="project_leader"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-white"
                    >Project Leader
                    </label>
                </div>
                <div id="project_members"
                     data-te-chips-input-init data-te-chips-placeholder data-te-name-text="project_members"
                     data-te-label-text="Project Members"
                     class="mb-0 min-h-[45px] pb-0 shadow-none transition-all duration-300 ease-[cubic-bezier(0.25,0.1,0.25,1)] hover:cursor-text focus:outline-none focus:ring-0 focus:border-white"
                     data-te-editable="true"></div>

                <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init data-te-validate="input"
                     data-te-validation-ruleset="isRequired"
                     data-te-input-form-white="true">
                    <input id="project_start" name="project_start"
                           type="text"
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
                           type="text"
                           class="peer block min-h-[auto] w-full rounded border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                           placeholder="Select the start date"/>
                    <label
                        for="project_end"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-white"
                    >Select the end date</label>
                </div>
                <input
                    type="submit"
                    class="inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    value="Create"/>
            </form>

        </div>
    </div>
    <script type="text/javascript">
        function addName() {
            document.getElementById('header_project_name').innerHTML = document.getElementById('project_name').value;
        }

        document.getElementById('project_name').addEventListener('input', addName);
    </script>

</x-app-layout>
