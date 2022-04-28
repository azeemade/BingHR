<div class="flex justify-between pt-5 py-10 items-center">
    <div class="flex items-center">
        <p class="mr-6 font-medium text-lg">Users</p>
        <div class="mr-4">
            <select class="form-select
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding bg-no-repeat
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                <option selected>Year</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
            </select>
        </div>
        <div>
            @include("includes.searchbar")
        </div>
    </div>
    <div class="flex space-x-6">
        <div class="flex space-x-4">
            <button>
                Language
                <i class="bi bi-caret-down-fill text-gray-500 text-xs"></i>
            </button>
            <button>
                Reports
                <i class="bi bi-caret-down-fill text-gray-500 text-xs"></i>
            </button>
            <button>
                Project
                <i class="bi bi-caret-down-fill text-gray-500 text-xs"></i>
            </button>
        </div>
        <div class="flex space-x-4">
            <button class="relative">
                <div class="absolute inline-block top-0 right-0 bottom-auto left-auto translate-x-2/4 translate-y-0 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 p-1 text-xs bg-sky-500 rounded-full z-10"></div>
                <i class="bi bi-envelope-fill text-lg"></i>
            </button>
            <button class="relative">
                <div class="absolute inline-block top-0 right-0 bottom-auto left-auto translate-x-2/4 translate-y-0 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 p-1 text-xs bg-sky-500 rounded-full z-10"></div>
                <i class="bi bi-bell-fill text-lg"></i>
            </button>
            <button>
                <i class="bi bi-person-fill text-lg"></i>
            </button>
        </div>
    </div>
</div>