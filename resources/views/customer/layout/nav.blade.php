@vite(["resources/sass/app.scss", "resources/js/app.js"])
<header class="d-flex justify-content-around py-1 px-0" style="background-color: #eae9e9">
    <ul class="nav justify-content-around " style="width:100%;font-family: Arial; font-weight: bold">
        <li class="nav-item">
            <img src="{{asset('./icons/celement cat.png')}}" alt="brand"
                 height="36px" class="rounded">
        </li>
        <li class="nav-item d-flex">
            <a class="nav-link link-dark" href="{{ route('index') }}"> PRODUCT </a>
            <button class="nav-link link-dark dropdown-toggle p-0" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"></button>
            <ul class="dropdown-menu ">
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> Animal </a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> City </a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> Architecture</a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> Expert Creator </a>
                </li>
                <li class="dropdown-item">
                    <a class="nav-link link-dark"> Stars War </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark">
                BEST SELLER
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark">
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
                <i class="bi bi-cart h4"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{ route('profile') }}">
                <i class="bi bi-person h3"></i>
            </a>
        </li>
    </ul>
</header>