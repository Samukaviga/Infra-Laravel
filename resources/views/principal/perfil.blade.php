<x-layout>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        @isset($mensagemSucesso)
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ $mensagemSucesso }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endisset

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Detalhes Perfil</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="students.html">Perfil</a></li>
                                <li class="breadcrumb-item active">Detalhes Perfil</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-info">
                                <h4>Perfil<span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h4>
                            </div>
                            <div class="student-profile-head">
                                <div class="profile-bg-img">
                                    <img src="assets/img/profile-bg.jpg" alt="Profile">
                                </div>
                                <div class="row">

                                    
                                    <div class="col-lg-4 col-md-4">
                                        
                                      <form action="/perfil/foto" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="profile-user-box">
                                            <div class="profile-user-img">
                                                <img src="{{ Auth::user()->imagem ? asset('storage/' . Auth::user()->imagem) : asset('assets/img/profile-user.jpg') }}" alt="Profile">
                                                <div class="input-block students-up-files profile-edit-icon mb-0">
                                                    <div class="uplod d-flex">
                                                        <label class="file-upload profile-upbtn mb-0">
                                                           
                                                        
                                                            <i class="feather-edit-3"></i><input type="file" name="imagem" id="imagem" accept="image/*">
                                                       
                                                        
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="names-profiles">
                                                <h4>{{ $user->name }}</h4>
                                                <h5>--</h5>
                                            </div>

                                        </div>

                                        <div class="bank-details-btn">                      
                                            <button type="submit" class="btn bank-cancel-btn m-3 btn-sm py-2">Salvar</button>
                                        </div>
                                    </form>
                                    
                                    </div>

                                   
                                   
                                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                        <div class="follow-btn-group">
                                            
                                          <!--  <button type="submit" class="btn btn-info message-btns">Mensagem</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="student-personals-grp">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="heading-detail">
                                            <h4>Detalhes :</h4>
                                        </div>
                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-user"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Name</h4>
                                                <h5>{{ $user->name }}</h5>
                                            </div>
                                        </div>
                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <img src="assets/img/icons/buliding-icon.svg" alt="img">
                                            </div>
                                            <div class="views-personal">
                                                <h4>Departamento </h4>
                                                <h5>--</h5>
                                            </div>
                                        </div>
                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-phone-call"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Celular</h4>
                                                <h5>--</h5>
                                            </div>
                                        </div>
                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-mail"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Email</h4>
                                                <h5>{{ $user->email }}</h5>
                                            </div>
                                        </div>
                                       
                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-calendar"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Data aniversario</h4>
                                                <h5>--</h5>
                                            </div>
                                        </div>
                                      
                                        <div class="personal-activity mb-0">
                                            <div class="personal-icons">
                                                <i class="feather-map-pin"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Endereço</h4>
                                                <h5>--</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="student-personals-grp">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="heading-detail">
                                            <h4>Skills:</h4>
                                        </div>
                                        <div class="skill-blk">
                                            <div class="skill-statistics">
                                                <div class="skills-head">
                                                    <h5>Photoshop</h5>
                                                    <p>70%</p>
                                                </div>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-photoshop" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="skill-statistics">
                                                <div class="skills-head">
                                                    <h5>Code editor</h5>
                                                    <p>75%</p>
                                                </div>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-editor" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="skill-statistics mb-0">
                                                <div class="skills-head">
                                                    <h5>Illustrator</h5>
                                                    <p>95%</p>
                                                </div>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-illustrator" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="student-personals-grp">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="heading-detail">
                                            <h4>Sobre Mim</h4>
                                        </div>
                                        <div class="hello-park">
                                            <h5>Hello I am Daisy Parks</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur officia deserunt mollit anim id est laborum.</p>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                                        </div>
                                        <div class="hello-park">
                                            <h5>Education</h5>
                                            <div class="educate-year">
                                                <h6>2008 - 2009</h6>
                                                <p>Secondary Schooling at xyz school of secondary education, Mumbai.</p>
                                            </div>
                                            <div class="educate-year">
                                                <h6>2011 - 2012</h6>
                                                <p>Higher Secondary Schooling at xyz school of higher secondary education, Mumbai.</p>
                                            </div>
                                            <div class="educate-year">
                                                <h6>2012 - 2015</h6>
                                                <p>Bachelor of Science at Abc College of Art and Science, Chennai.</p>
                                            </div>
                                            <div class="educate-year">
                                                <h6>2015 - 2017</h6>
                                                <p class="mb-0">Master of Science at Cdm College of Engineering and Technology, Pune.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-layout>