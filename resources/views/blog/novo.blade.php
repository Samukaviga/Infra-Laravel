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
            <div class="row">
                <div class="col-xl-12">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Add Post</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                    <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">

                                    
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Titulo</label>
                                                <input name="titulo" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 my-2">
                                            <div class="input-block">
                                                <label>Imagem Blog</label>
                                                <div class="change-photo-btn">
                                                    <input type="file" name="imagem" id="imagem" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Descricao</label>
                                                <textarea name="descricao" class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                        </div>
                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn">                      
                                <button type="submit" class="btn bank-cancel-btn me-2"> Add Post</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-layout>