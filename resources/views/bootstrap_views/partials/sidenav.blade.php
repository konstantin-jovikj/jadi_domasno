<div class="col-lg-2 col-sm-12 bg-dark-custom mx-0 px-0">
    <ul class="list-group list-group-flush text-light mt-5">

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('dashboard') ? 'active-link' : '' }}"
            href="{{route('dashboard')}}">
            <i class="fa-solid fa-users" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Users</li>
        </a>

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('view.archivedusers') ? 'active-link' : '' }}"
            href="{{route('view.archivedusers')}}">
            <i class="fa-solid fa-users" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Archived Users</li>
        </a>

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('view.dishes') ? 'active-link' : '' }}"
            href="{{route('view.dishes')}}">
            <i class="fa-solid fa-utensils" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Dishes</li>
        </a>

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('view.alergens') ? 'active-link' : '' }}"
            href="{{route('view.alergens')}}">
            <i class="fa-solid fa-hand-dots" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Alergens</li>
        </a>

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('view.municipalities') ? 'active-link' : '' }}"
            href="{{route('view.municipalities')}}">
            <i class="fa-solid fa-tree-city" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Municipalities</li>
        </a>

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('view.category') ? 'active-link' : '' }}"
            href="{{route('view.category')}}">
            <i class="fa-solid fa-utensils" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Categories</li>
        </a>

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('view.spicy') ? 'active-link' : '' }}"
            href="{{route('view.spicy')}}">
            <i class="fa-solid fa-pepper-hot" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Spiciness</li>
        </a>

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('view.status') ? 'active-link' : '' }}"
            href="{{route('view.status')}}">
            <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Order Status List</li>
        </a>

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('orders') ? 'active-link' : '' }}"
            href="{{route('orders')}}">
            <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Orders</li>
        </a>

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('view.subscribers') ? 'active-link' : '' }}"
            href="{{ route('view.subscribers') }}">
            <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">Subscribers</li>
        </a>





    </ul>
</div>
