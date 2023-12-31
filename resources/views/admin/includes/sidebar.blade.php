<style>
  .bg-gradient-primary {
    background-image: linear-gradient(to right, #999999, #008080);
  }
</style>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  bg-gradient-primary" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
      <img src="{{('/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white">Admin T$T</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link text-white " href="{{route('products.index')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-folder"></i>
          </div>
          <span class="nav-link-text ms-1"> {{ __('language.PRODUCTS') }}
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white " href="{{route('products.trash')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons">delete</i>
          </div>
          <span class="nav-link-text ms-1">{{ __('language.TRASH PRODUCTS') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white " href="{{route('group.index')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-users"></i>
          </div>
          <span class="nav-link-text ms-1">{{ __('language.GROUP') }}</span>
        </a>
      </li>







      <li class="nav-item">
        <a class="nav-link text-white " href="{{route('categories.index')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">{{ __('language.CATEGORIES') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white " href="{{route('order.index')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">assignment</i>
          </div>
          <span class="nav-link-text ms-1">{{ __('language.ORDER') }}</span>
        </a>
      </li>

      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('language.ACCOUNT PAGES') }}</h6>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white " href="{{route('user.index')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons">&#x1F464;</i>
          </div>
          <span class="nav-link-text ms-1">{{ __('language.USER') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white " href="{{route('logoutadmin')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons">logout</i>
          </div>
          <span class="nav-link-text ms-1">{{ __('language.LOGOUT') }}</span>
        </a>
      </li>


    </ul>
  </div>
  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
    </div>
  </div>
</aside>