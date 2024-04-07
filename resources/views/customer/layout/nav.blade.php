@vite(["resources/sass/app.scss", "resources/js/app.js"])
<header class="d-flex justify-content-around align-items-center py-lg-2 px-0" style="background-color: #eeeded">
    <ul class="nav justify-content-around" style="width:100%;font-family: Arial; font-weight: bold; font-size: 18px">
        <li class="nav-item">
            <img src="{{asset('./icons/celement cat.png')}}" alt="brand"
                 height="36px" class="rounded">
        </li>
        <li class="nav-item d-flex">
            <a class="nav-link link-dark px-1" href="{{ route('index') }}"> PRODUCT </a>
            <button class="nav-link link-dark dropdown-toggle p-0" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"></button>
            @php
                $categories = \App\Models\Category::all();
            @endphp
            <ul class="dropdown-menu">
                @foreach($categories as $category)
                    <li class="dropdown-item">
                        <a class="nav-link link-dark" href=" {{route('customer.filter', $category->id)}}"> {{$category->name}} </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('customer.bestSeller')}}" class="nav-link link-dark">
                BEST SELLER
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('customer.new')}}" class="nav-link link-dark">
                NEW
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('contact')}}" class="nav-link link-dark">
                CONTACT
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('product.cart') }}"
               class="nav-link text-black">
                <i class="bi bi-cart h3"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('profile') }}">
                <img style="width:28px" src="{{ asset('./icons/user.png')}}">
            </a>
        </li>
    </ul>
</header>