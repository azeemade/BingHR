<div class="flex justify-between px-5 pt-5 py-10">
    <div class="flex">
        <p class="mr-6 font-medium text-lg">Users</p>
        <div class="mr-4">
            <select name="" id="">
                <option>Year</option>
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
                <i class="bi bi-caret-down-fill text-gray-500"></i>
            </button>
            <button>
                Reports
                <i class="bi bi-caret-down-fill text-gray-500"></i>
            </button>
            <button>
                Project
                <i class="bi bi-caret-down-fill text-gray-500"></i>
            </button>
        </div>
        <div class="flex space-x-4">
            <button>
                <i class="bi bi-envelope-fill"></i>
            </button>
            <button>
                <i class="bi bi-bell-fill"></i>
            </button>
            <button>
                <i class="bi bi-person-fill"></i>
            </button>
        </div>
    </div>
</div>