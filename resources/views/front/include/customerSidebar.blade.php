<div class="rightbar">
    <h4 class="m-text23 p-b-34"> My Account </h4>
    <ul>
        <li class="p-2 bo7 {{ request()->is('myaccount') ? ' active' : '' }}">
            <a href="{{ url('/myaccount') }}" class="s-text13"> Account Information </a>
        </li>
        <li class="p-2 bo7 {{ request()->is('myaccount/orders') ? ' active' : '' }}">
            <a href="{{ url('/myaccount/orders') }}" class="s-text13"> My Orders </a>
        </li>
        <li class="p-2 bo7 {{ request()->is('myaccount/wishlist') ? ' active' : '' }}">
            <a href="{{ url('/myaccount/wishlist') }}" class="s-text13"> My Wishlist </a>
        </li>
        <li class="p-2 bo7 {{ request()->is('myaccount/change-password') ? ' active' : '' }}">
            <a href="{{ url('/myaccount/change-password') }}" class="s-text13"> Change Password </a>
        </li>
        <li class="p-2 bo7">
            <a href="{{ url('/myaccount/logout') }}" class="s-text13"> Logout </a>
        </li>
    </ul>
</div>