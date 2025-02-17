<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
      <div class="sidebar-brand-icon">
          <img class="img-profile rounded-circle" src=""
              style="max-width: 60px">
      </div>
      <div class="sidebar-brand-text mx-3">{{ auth()->user()->name }}</div>
  </a>

  <hr class="sidebar-divider my-0">
  {{-- @can('dashboard_index') --}}
      <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">
              <i class="fas fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>
  {{-- @endcan --}}

  {{-- @can('user_index') --}}
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
              aria-expanded="true" aria-controls="collapseUser">
              <i class="fas fa-user"></i>
              <span>User</span>
          </a>
          <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('user_create') --}}
                      <a class="collapse-item" href="{{route('user.create')}}">Add User</a>
                  {{-- @endcan --}}
                  <a class="collapse-item" href="{{ route('user.index') }}">User List</a>
              </div>
          </div>
      </li>
  {{-- @endcan --}}
  {{-- @can('permission_index') --}}
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepermission"
              aria-expanded="true" aria-controls="collapsepermission">
              <i class="fas fa-lock"></i>
              <span>Permission </span>
          </a>
          <div id="collapsepermission" class="collapse" aria-labelledby="headingpermission"
              data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('permission_create') --}}
                      <a class="collapse-item" href="{{ route('permission.create') }}">Add Permission</a>
                  {{-- @endcan --}}
                  <a class="collapse-item" href="{{ route('permission.index') }}">Permission List</a>
              </div>
          </div>
      </li>
  {{-- @endcan --}}
  {{-- @can('role_index') --}}
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapserole"
              aria-expanded="true" aria-controls="collapserole">
              <i class="fa fa-address-card"></i>
              <span>Role</span>
          </a>
          <div id="collapserole" class="collapse" aria-labelledby="headingrole" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('role_create') --}}
                      <a class="collapse-item" href="{{ route('role.create') }}">Add Role</a>
                  {{-- @endcan --}}
                  <a class="collapse-item" href="{{ route('role.index') }}">Role List</a>
              </div>
          </div>
      </li>
  {{-- @endcan --}}
  {{-- @can('slider_index') --}}
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseslider"
              aria-expanded="true" aria-controls="collapseslider">
              <i class="fas fa-window-maximize"></i>
              <span>Slider</span>
          </a>
          <div id="collapseslider" class="collapse" aria-labelledby="headingslider" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('slider_create') --}}
                      <a class="collapse-item" href="{{ route('slider.create') }}">Add Slider</a>
                  {{-- @endcan --}}
                  <a class="collapse-item" href="{{ route('slider.index') }}">Slider List</a>
              </div>
          </div>
      </li>
  {{-- @endcan --}}

  {{-- @can('block_index') --}}
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseblock"
              aria-expanded="true" aria-controls="collapseblock">
              <i class="fas fa-th-large"></i>
              <span>Block</span>
          </a>
          <div id="collapseblock" class="collapse" aria-labelledby="headingblock" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('block_create') --}}
                      <a class="collapse-item" href="{{ route('block.create') }}">Add Block</a>
                  {{-- @endcan --}}
                  <a class="collapse-item" href="{{ route('block.index') }}">Block List</a>
              </div>
          </div>
      </li>
  {{-- @endcan --}}

  {{-- @can('page_index') --}}
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepage"
              aria-expanded="true" aria-controls="collapsepage">
              <i class="fas fa-copy"></i>
              <span>Page</span>
          </a>
          <div id="collapsepage" class="collapse" aria-labelledby="headingpage" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('page_create') --}}
                      <a class="collapse-item" href="{{ route('page.create') }}">Add Page</a>
                  {{-- @endcan --}}
                  <a class="collapse-item" href="{{ route('page.index') }}">Page List</a>
              </div>
          </div>
      </li>
  {{-- @endcan --}}

  {{-- @can('product_index') --}}
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseproduct"
              aria-expanded="true" aria-controls="collapseproduct">
              <i class="fas  fa-cube"></i>
              <span>Product</span>
          </a>
          <div id="collapseproduct" class="collapse" aria-labelledby="headingproduct" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('product_create') --}}
                      <a class="collapse-item" href="{{route('product.create')}}">Add Product</a>
                  {{-- @endcan --}}
                  <a class="collapse-item" href="{{route('product.index')}}">Product List</a>
              </div>
          </div>
      </li>
  {{-- @endcan --}}
  {{-- @can('attribute_index') --}}
      {{-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseattribute"
              aria-expanded="true" aria-controls="collapseattribute">
              <i class="fas fa-plus-square" aria-hidden="true"></i>
              <span>Attribute</span>
          </a>
          <div id="collapseattribute" class="collapse" aria-labelledby="headingattribute"
              data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('attribute_create') 
                      <a class="collapse-item" href="">Add Attribute</a>
                  {{-- @endcan 
                  <a class="collapse-item" href="">Attribute List</a>
              </div>
          </div>
      </li> --}}
  {{-- @endcan --}}

  {{-- @can('attributevalue_index') --}}
      {{-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseattributevalue"
              aria-expanded="true" aria-controls="collapseattributevalue">
              <i class="fas fa-terminal" aria-hidden="true"></i>
              <span>attribute value</span>
          </a>
          <div id="collapseattributevalue" class="collapse" aria-labelledby="headingattributevalue"
              data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('attributevalue_create') 
                      <a class="collapse-item" href="">Add Attribute Value</a>
                  {{-- @endcan 
                  <a class="collapse-item" href="">Attribute Value List</a>
              </div>
          </div>
      </li> --}}
  {{-- @endcan --}}
  {{-- @can('category_index') --}}
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecategory"
              aria-expanded="true" aria-controls="collapsecategory">
              <i class="fas fa-stream" aria-hidden="true"></i>
              <span>category</span>
          </a>
          <div id="collapsecategory" class="collapse" aria-labelledby="headingcategory"
              data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('category_create') --}}
                      <a class="collapse-item" href="{{ route('category.create') }}">Add category</a>
                  {{-- @endcan --}}
                  <a class="collapse-item" href="{{ route('category.index') }}">category List</a>
              </div>
          </div>
      </li>
  {{-- @endcan --}}
  {{-- @can('coupon_index') --}}
      {{-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecoupon"
              aria-expanded="true" aria-controls="collapsecoupon">
              <i class="fas fa-ticket-alt" aria-hidden="true"></i>
              <span>coupon</span>
          </a>
          <div id="collapsecoupon" class="collapse" aria-labelledby="headingcoupon" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  {{-- @can('coupon_create') 
                      <a class="collapse-item" href="">Add coupon</a>
                  
                  @endca
                  <a class="collapse-item" href="">coupon List</a>
              </div>
          </div>
      </li> --}}
  {{-- @endcan --}}

  {{-- @can('enquiry_index') --}}
  <li class="nav-item ">
      <a class="nav-link" href="">
          <i class="fas fa-question"></i>
          <span>Enquiry</span></a>
  </li>
{{-- @endcan --}}

{{-- <li class="nav-item ">
  <a class="nav-link" href="">
      <i class="fas fa-box"></i>
      <span>Order</span></a>
</li> --}}
</ul>
