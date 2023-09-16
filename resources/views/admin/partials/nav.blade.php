<aside class="side-nav">

    <div class="logo">
        <img src="{{asset('img/Toy-Store-Logo.png')}}" alt="Adminpanel Logo">
        ADMINPANEL
    </div>

    <ul>
        <li>
            <a href="{{route('adminpanel')}}">Dashboard</a>
        </li>
        <li>
            <a href="{{route('adminpanel.products')}}">Products</a>
        </li>
        <li>
            <a href="{{route('adminpanel.categories')}}">Categories</a>
        </li>
        <li>
            <a href="{{route('adminpanel.colors')}}">Colors</a>
        </li>
        <li>
            <a href="{{route('adminpanel.orders')}}">Orders</a>
        </li>
    </ul>

    <div class="logout">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11.25 19a.75.75 0 0 1 .75-.75h6a.25.25 0 0 0
                    .25-.25V6a.25.25 0 0 0-.25-.25h-6a.75.75 0 0 1 0-1.5h6c.966 0 1.75.784 1.75 1.75v12A1.75
                    1.75 0 0 1 18 19.75h-6a.75.75 0 0 1-.75-.75Z"/>
                    <path fill="currentColor" d="M15.612 13.115a1 1 0 0 1-1 1H9.756c-.023.356-.052.71-.086
                    1.066l-.03.305a.718.718 0 0 1-1.025.578a16.844 16.844 0 0 1-4.885-3.539l-.03-.031a.721.721
                    0 0 1 0-.998l.03-.031a16.843 16.843 0 0 1 4.885-3.539a.718.718 0 0 1 1.025.578l.03.305c.034.355.063.71.086 1.066h4.856a1
                    1 0 0 1 1 1v2.24Z"/>
                </svg>
                &nbsp; Logout
            </button>
        </form>
    </div>

</aside>
