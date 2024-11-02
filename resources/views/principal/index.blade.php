<x-layout :mensagem-sucesso="$mensagemSucesso">


    <!-- Page Wrapper -->
    <div class="page-wrapper">

        @if(session('mensagemSucesso'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('mensagemSucesso') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Seja bem vindo!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="profile-bg-img mb-4">
                <img src="assets/img/profile-bg.jpg" alt="Profile">
            </div>

            <div class="profile-bg-img mb-4 row d-flex">

                <div class="col-xl-6 col-sm-6 col-6 ">
                    <img src="assets/img/profile-bg.jpg" alt="Profile">
                </div>

                <div class="col-xl-6 col-sm-6 col-6">
                    <img src="assets/img/profile-bg.jpg" alt="Profile">
                </div>
            </div>

            <!-- Overview Section -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Students</h6>
                                    <h3>50055</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Awards</h6>
                                    <h3>50+</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/dash-icon-02.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Department</h6>
                                    <h3>30+</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Revenue</h6>
                                    <h3>$505</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/dash-icon-04.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Overview Section -->



            <div class="row">
                <div class="col-xl-6 d-flex">
                    <!-- Star Students -->
                    <div class="card flex-fill student-space comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title">Eventos/Datas Importantes</h5>
                            <ul class="chart-list-out student-ellips">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table star-student table-hover table-center table-borderless table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">Nome</th>
                                            <th class="text-center">Hora</th>
                                            <th class="text-center">Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($eventos as $evento)

                                        <tr>

                                            <td class="text-nowrap">
                                                <a href="profile.html">
                                                    <img class="rounded-circle" src="assets/img/profiles/avatar-02.jpg" width="25" alt="Star Students">
                                                    {{ $evento->nome }}
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $evento->horario }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y') }}</td>

                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Star Students -->
                </div>

                <div class="col-xl-6 d-flex">
                    <!-- Feed Activity -->
                    <div class="card flex-fill comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title ">Noticias Empresa</h5>
                            <ul class="chart-list-out student-ellips">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="activity-groups">
                             
                                @foreach ($noticias as $noticia )

                                <div class="activity-awards">
                                    <div class="award-boxs">
                                        <img src="assets/img/icons/award-icon-02.svg" alt="Award">
                                    </div>
                                    <div class="award-list-outs">
                                        <h4>{{ $noticia->titulo }}</h4>
                                        <h5>{{ $noticia->descricao }}</h5>
                                    </div>
                                    <div class="award-time-list">
                                        <span>2 horas</span>
                                    </div>
                                </div>

                                @endforeach
                               
                              
                            </div>
                        </div>
                    </div>
                    <!-- /Feed Activity -->
                </div>

                <div class="col-12 col-lg-12 col-xl-12 d-flex">
                    <div class="card flex-fill comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title">Reuniões Semanais</h5>
                            <ul class="chart-list-out student-ellips">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="teaching-card">

                                <ul class="activity-feed">

                                    @foreach ($reunioes as $reuniao)

                                    <li class="feed-item d-flex align-items-center">
                                        <div class="dolor-activity">
                                            <span class="feed-text1"><a>{{ $reuniao->nome }}</a></span>
                                            <ul class="teacher-date-list">
                                                <li><i class="fas fa-calendar-alt me-2"></i><!-- 22 de Setembro, 2024 --> {{ \Carbon\Carbon::parse($reuniao->data)->translatedFormat('d \d\e F, Y') }}</li>
                                                <li>|</li>
                                                <li><i class="fas fa-clock me-2"></i>{{ $reuniao->horario }}</li>
                                            </ul>
                                        </div>
                                        <div class="activity-btns ms-auto">
                                            <button type="submit" class="btn btn-info">In Progress</button>
                                        </div>
                                    </li>

                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Socail Media Follows -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill fb sm-box">
                        <div class="social-likes">
                            <p>Seguidores Facebook</p>
                            <h6>50,095</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill twitter sm-box">
                        <div class="social-likes">
                            <p>Seguidores twitter</p>
                            <h6>48,596</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-02.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill insta sm-box">
                        <div class="social-likes">
                            <p>Seguidores instagram</p>
                            <h6>52,085</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-03.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill linkedin sm-box">
                        <div class="social-likes">
                            <p>Seguidores linkedin</p>
                            <h6>69,050</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-04.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Socail Media Follows -->
        </div>





</x-layout>