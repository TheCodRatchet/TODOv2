<div class="py-4 px-8">

    <div class="mb-4">
        <label for="title" class="block text-grey-darker text-sm font-bold mb-2">Title</label>
        <input id="title" class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
               name="title" placeholder="Enter Task Title">
    </div>

    <div class="mb-4">
        <label for="content" class="block text-grey-darker text-sm font-bold mb-2">Content</label>
        <textarea id="content" class=" border rounded w-full py-2 px-3 text-grey-darker" name="content"></textarea>
    </div>

    <div class="mb-4">
        <button
            class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500 ">
            {{ $task === null ? 'Create' : 'Save'}}
        </button>
    </div>
</div>

