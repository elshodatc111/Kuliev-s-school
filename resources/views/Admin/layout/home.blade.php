<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="https://atko.tech/NiceAdmin/assets/img/favicon.png" rel="icon">
  <link href="https://atko.tech/NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://atko.tech/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://atko.tech/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="https://atko.tech/NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="https://atko.tech/NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="https://atko.tech/NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="https://atko.tech/NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="https://atko.tech/NiceAdmin/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block w-100 text-center">MyCrm</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link nav-icon" href="#" title="O'qivchilar uchun elonlar">
                        <i class="bi bi-phone-vibrate"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon" href="#" title="O'qituvchilar uchun elonlar">
                        <i class="bi bi-megaphone"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon" href="#" title="Tug'ilgan kunlar">
                        <i class="bi bi-gift"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon" href="#" title="Eslatmalar">
                        <i class="bi bi-alarm"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon" href="#" title="Murojatlar">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle" class="rounded-circle" style="font-size: 30px;"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Filial</span>
                            <a href="../admin/"><span>Admin filila</span></a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="./kabinet.html"><i class="bi bi-person"></i><span>Kabinet</span></a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i><span>Chiqish</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
  
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="index.html"><i class="bi bi-grid"></i><span>Bosh sahifa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="./tashrif.html"><i class="bi bi-people"></i><span>Tashriflar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="./guruh.html"><i class="bi bi-people"></i><span>Guruhlar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="./moliya.html"><i class="bi bi-bar-chart"></i><span>Moliya</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="./techer.html"><i class="bi bi-person"></i><span>O'qituvchilar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="./hodim.html"><i class="bi bi-person"></i><span>Hodimlar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="./eslatma.html"><i class="bi bi-person"></i><span>Eslatmalar</span></a>
            </li>
        </ul>
    </aside>
  
    @yield('content')
  
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
    </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://atko.tech/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="https://atko.tech/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://atko.tech/NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="https://atko.tech/NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="https://atko.tech/NiceAdmin/assets/vendor/quill/quill.min.js"></script>
  <script src="https://atko.tech/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="https://atko.tech/NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="https://atko.tech/NiceAdmin/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://atko.tech/NiceAdmin/assets/js/main.js"></script>
</body>
</html>