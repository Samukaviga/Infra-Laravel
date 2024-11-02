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
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Adicionar Noticia</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row mt-2">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="/adicionarNoticia" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row p-2">


                                    <div class=" col-12 col-sm-12 m-3">
                                        <div class="input-block local-forms">
                                            <label>Titulo</label>
                                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" maxlength="50" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-12 m-3">
                                        <div class="input-block local-forms">
                                            <label>Descricao</label>
                                            <input type="text" name="descricao" id="descricao" value="{{ old('descricao') }}" maxlength="50" class="form-control">
                                        </div>
                                    </div>



                                    <div class="col-12 m-3">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Adicionar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- /Page Wrapper -->



    </div>
    <!-- /Main Wrapper -->


</x-layout>