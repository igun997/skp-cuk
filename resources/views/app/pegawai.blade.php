<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{url("favicon.ico")}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{url("favicon.ico")}}" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>@yield("title")</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{url("assets/js/require.min.js")}}"></script>
    <script>
      requirejs.config({
          baseUrl: '{{url("assets")}}'
      });
    </script>
    <link rel="stylesheet" href="{{url("assets/plugins/datatables/dataTables.bootstrap4.min.css")}}">
    <link href="{{url("assets/css/dashboard.css")}}" rel="stylesheet" />
    <script src="{{url("assets/js/dashboard.js")}}"></script>
    <link href="{{url("assets/plugins/charts-c3/plugin.css")}}" rel="stylesheet" />
    <script src="{{url("assets/plugins/charts-c3/plugin.js")}}"></script>
    <script src="{{url("assets/plugins/input-mask/plugin.js")}}"></script>
    <script src="{{url("assets/plugins/datatables/plugin.js")}}"></script>
    @yield("css")
    <style type="text/css">
    .nav-tabs .nav-link:hover:not(.disabled){
      color: #fff !important;
    }
    .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link{
      color: #fff !important;

    .notification-wrapper {
  max-height: 190px; }

.notification-list {
  margin-left: 0; }
  .notification-list .noti-title {
    background-color: #ffffff;
    padding: 7px 20px; }
  .notification-list .noti-icon {
    font-size: 20px;
    padding: 0 15px;
    vertical-align: middle; }
  .notification-list .noti-icon-badge {
    display: inline-block;
    position: absolute;
    top: 14px;
    right: 8px; }
  .notification-list .notify-item {
    padding: 10px 20px; }
    .notification-list .notify-item .notify-icon {
      float: left;
      height: 36px;
      width: 36px;
      line-height: 36px;
      text-align: center;
      margin-right: 10px;
      border-radius: 50%;
      color: #ffffff; }
    .notification-list .notify-item .notify-details {
      margin-bottom: 0;
      overflow: hidden;
      margin-left: 45px;
      text-overflow: ellipsis;
      white-space: nowrap; }
      .notification-list .notify-item .notify-details b {
        font-weight: 500; }
      .notification-list .notify-item .notify-details small {
        display: block; }
      .notification-list .notify-item .notify-details span {
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 13px; }
    .notification-list .notify-item .user-msg {
      margin-left: 45px;
      white-space: normal;
      line-height: 20px; }
  .notification-list .profile-dropdown .notify-item {
    padding: 7px 20px; }


    }
    </style>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4" style="background-color: #394F14">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="{{url("")}}">
                <img src="{{url("img/logo.png")}}"  alt="" style="width:100px;">
              </a>
               <div class="user-box">
                <img src="{{url("img/gambar.png")}}" alt="" style="width:180px;">
               </div>

              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown notification-list">
                  <a href="#" class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" role="button" ria-haspopup="false" aria-expanded="true">
                    <span class="avatar" style="background-image: url(//www.gravatar.com/avatar/94d093eda664addd6e450d7e9881bcad?s=32&d=identicon&r=PG)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default" style="color: #fff !important">{{session()->get("nama")}}</span>
                      <small class="text-muted d-block mt-1">Pegawai</small>
                    </span>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated " style="clear: both; position: absolute; transform: translate3d(92px, 50px, 0px); top: 0px; left: 0px; will-change: transform;" >
                  <a href="" class="dropdown-item notify-item"></i class="fe fe-people"></i> Profil </a>
                  <a href="{{route("logout")}}" class="dropdown-item notify-item"></i class="fa fa-sign-out"></i> Logout </a>
                  </div>
                  </a>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse" style="background-color: #157400;">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 ml-auto">
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row" style="color: #00FF00;">
                  <li class="nav-item">
                    <a href="{{route("pegawai")}}" class="nav-link"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> SKP</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{route("pegawai.skp.index")}}" class="dropdown-item ">SKP Realisasi</a>
                      <a href="{{route("pegawai.perilaku.index")}}" class="dropdown-item ">Penilaian Perilaku Kerja</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                @yield("title")
              </h1>
            </div>
            
            <div class="row row-cards">
              @yield("content")
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
              <div class="row align-items-center">
                Sistem Informasi Penilaian Kepegawaian
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2019  All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    </div>
    @yield("js")
  </body>
</html>
