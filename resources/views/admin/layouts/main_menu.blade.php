
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}/admin/dash" class="brand-link">
      <img src="{{url('/')}}/admin/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
    <span class="brand-text font-weight-light">{{__('ArabGroup')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('/')}}/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block" style="text-transform: uppercase">{{auth()->user()->user_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-user-circle nav-icon"></i>
              <p>
                قسم المستخدمين
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('/admin/admins')}}" class="nav-link">
            <i class="fas fa-users-cog nav-icon"></i>
              <p>
                المشرفين
              </p>
            </a>
          </li>
          
          <li class="nav-item">
          <a href="{{url('/admin/user')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                العملاء
              </p>
            </a>
          </li> 
            </ul>
          </li>


       <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-book nav-icon"></i>
              <p>
                قسم الكتب
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('/admin/category')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                التصنيفات
              </p>
            </a>
          </li>

          <li class="nav-item">
          <a href="{{url('/admin/books')}}" class="nav-link">
            <i class="fas fa-book-open nav-icon"></i>
              <p>
                الكتب
              </p>
            </a>
          </li>
            </ul>
       </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-flag nav-icon"></i>
              <p>
                قسم البلدان
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/country')}}" class="nav-link">
                  <i class="far fa-flag nav-icon"></i>
                  <p>البلدان</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/city')}}" class="nav-link">
                  <i class="fas fa-city nav-icon"></i>
                  <p>المدن</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/agent')}}" class="nav-link">
              <i class="fas fa-closed-captioning nav-icon"></i>
              <p>التوزيعات</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/dists')}}" class="nav-link">
              <i class="fas fa-closed-captioning nav-icon"></i>
              <p>الموزعين</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/fair')}}" class="nav-link">
              <i class="fas fa-book-reader nav-icon"></i>
              <p>المعارض</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/news')}}" class="nav-link">
              <i class="far fa-newspaper nav-icon"></i>
              <p>الاخبار</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/booklist')}}" class="nav-link">
              <i class="fas fa-closed-captioning nav-icon"></i>
              <p>قائمه الكتب</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/contact')}}" class="nav-link">
              <i class="far fa-comment-dots nav-icon"></i>
              <p>الرسائل</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/maillist')}}" class="nav-link">
              <i class="far fa-address-card nav-icon"></i>
              <p>قائمه العملاء</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{isset($setting->id)?route('setting.edit', $setting->id):'#'}}" class="nav-link">
              <i class="fas fa-cogs nav-icon"></i>
              <p>الاعدادات</p>
            </a>
          </li>

         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>