<div>
    <form wire:submit="updateProject">
        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium dark:text-white text-gray-700">Project Name</label>
            <input type="text" id="name" wire:model.live="name"
                   class="peer block min-h-[auto] w-full rounded border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">

        </div>

        <!-- Description Field -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium dark:text-white text-gray-700">Description</label>
            <textarea id="description" wire:model.live="description"
                      class="peer block min-h-[auto] w-full rounded border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"></textarea>  </div>

        <!-- Project Lead Field -->
        <div class="mb-4">
            <label for="project_lead" class="block text-sm font-medium dark:text-white text-gray-700">Project Lead</label>
            <input type="text" id="project_lead" wire:model.live="project_lead"
                   class="peer block min-h-[auto] w-full rounded border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
        </div>
        <label class="block text-sm font-medium dark:text-white text-gray-700">Project Members</label>
        <div id="project_members"
             data-te-chips-input-init data-te-chips-placeholder data-te-name-text="project_members"
             data-te-label-text=" "
             class="mb-0 min-h-[45px] pb-0 shadow-none transition-all duration-300 ease-[cubic-bezier(0.25,0.1,0.25,1)] hover:cursor-text focus:outline-none focus:ring-0 focus:border-white"
             data-te-editable="true"></div>

        <!-- Start Date Field -->
        <div class="mb-4">
            <label for="start" class="block text-sm font-medium dark:text-white text-gray-700">Start Date</label>
            <input type="date" id="start" wire:model.live="start" class="peer block min-h-[auto] w-full rounded border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
        </div>

        <!-- End Date Field -->
        <div class="mb-4">
            <label for="end" class="block text-sm font-medium dark:text-white text-gray-700">End Date</label>
            <input type="date" id="end" wire:model.live="end"  class="peer block min-h-[auto] w-full rounded border-white bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
        </div>

        <!-- Save Button -->
        <button
            type="submit"
            class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-ripple-init
            data-te-ripple-color="light">
            Save changes
        </button>
    </form>
</div>
