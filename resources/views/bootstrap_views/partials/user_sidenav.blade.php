<div class="col-lg-2 col-sm-12 bg-dark-custom mx-0 px-0 ">
    <ul class="list-group list-group-flush text-light mt-5">

        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('view.offers') ? 'active-link' : '' }}"
            href="{{route('view.offers')}}">
            <i class="fa-solid fa-utensils" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">My Offers</li>
        </a>


        <a class="list-group-custom bg-dark-custom d-flex {{ request()->routeIs('user.orders') ? 'active-link' : '' }}"
            href="{{ route('user.orders') }}">
            <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
            <li class="text-decoration-none text-light w-100 text-center">My Orders</li>
        </a>

    </ul>
</div>
