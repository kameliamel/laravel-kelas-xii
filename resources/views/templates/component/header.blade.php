<div class="header">
  <div class="container">
    <div class="w3layouts_logo">
      <a href="{{ route('home') }}"><h1>One<span>Movies</span></h1></a>
    </div>
    <div class="w3_search">
      <form action="#" method="post">
        <input type="text" name="Search" placeholder="Search" required="">
        <input type="submit" value="Go">
      </form>
    </div>
    <div class="w3l_sign_in_register">
      <ul>
        @guest
          <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
        @else
          @if (Auth::user()->isAdmin())
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          @endif
          <li><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}</li>
          <li>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" style="color: #fff; display: inline-block; text-transform: uppercase; text-decoration: none; background: #FF8D1B; text-align: center; padding: 6px 20px; font-weight: bold; border: none; cursor: pointer; transition: .5s ease-in;" onmouseover="this.style.background='#212121'" onmouseout="this.style.background='#FF8D1B'">Logout</button>
            </form>
          </li>
        @endguest
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>