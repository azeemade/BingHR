<ul class="items-center space-y-24 pt-24 bg-sky-500 h-full">
    <li class="flex-col flex items-center space-y-10">
        <a href="">
            <i class="bi bi-search text-white"></i>
        </a>
        <a href="">
            <i class="bi bi-calendar4-event text-white"></i>
        </a>
        <a href="">
            <i class="bi bi-person text-white"></i>
        </a>
        <a href="">
            <i class="bi bi-chat-dots text-white"></i>
        </a>
        <a href="">
            <i class="bi bi-file-earmark text-white"></i>
        </a>
    </li>
    <li class="flex-col flex items-center space-y-6 mb-6">
        <a href="">
            <i class="bi bi-gear text-white"></i>
        </a>
        <a href="">
            <img src="https://api.multiavatar.com/made.png" alt="user image" class="w-6 h-6">
        </a>
        <label onclick="openNav()" class="flex p-2.5 rounded shadow-sm  hover:shadow-lg  focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-150 ease-in-out" 
        type="button">
            <input type="checkbox" id="navBtn" class="opacity-0 w-0 h-0">
            <i class="bi bi-justify-left text-white"></i>
        </label>
        @include('includes.menulists')
    </li>
</ul>

<script>
    function openNav() {
        if(document.getElementById("navBtn").checked == true){
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
        else{
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }
    }
    </script>