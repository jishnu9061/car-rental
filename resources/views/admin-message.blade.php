<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        @include('css.style');
        </style>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">HI {{ auth()->guard('admin')->user()->name }}
    </span>
    </div>
      <ul class="nav-links">
        <li>
            <a href="{{ route('admin.panel') }}" class="active">
              <i class='bx bx-grid-alt' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
        <li>
          <a href="{{ route('user.detail') }}">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Users</span>
          </a>
        </li>
        <li>
          <a href="{{ route('car.detail') }}">
            <i class='bx bx-box' ></i>
            <span class="links_name">Cars</span>
          </a>
        </li>
        <li>
            <a href="{{ route('add.car') }}">
              <i class='bx bx-box' ></i>
              <span class="links_name">Add Cars</span>
            </a>
          </li>
        <li>
          <a href="{{ route('rental.history') }}">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Rental History</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.message')}}">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">{{ auth()->guard('admin')->user()->name }}
        </span>
        <i class='bx bx-chevron-down' ></i>
      </div>
      <a href="{{ route('admin.logout') }}"><input type="submit" value="Logout"></a>
    </nav>

    <div class="home-content">
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Url</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($message as $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->url }}</td>
                    <td>{{ $value->message }}</td>


                    <td>
                    <a href="{{ route('message.delete',encrypt(['id' => $value->id])) }}"><input class="btn btn-primary" type="submit" value="Delete"></a>
                </td>
                </tr>
                @endforeach
                <tbody>
            </table>
        </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>


