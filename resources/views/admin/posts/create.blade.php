@extends('admin.layout')

@push('css')
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Agregar nuevo Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Nuevo header</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')

    <div class="row">

        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Contenido del Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Título de la publicación</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                placeholder="Ingrese aquí el título de la publicación">
                            @error('title')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- contenido --}}
                        <div class="form-group">
                            <label for="body">Contenido Publicación</label>
                            <textarea id="summernote" id="content" name="body">
                                Place <em>some</em> <u>text</u> <strong>here</strong>
                            </textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </div>

        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos Extras</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                    <div class="form-group">
                        <label>Fecha de publicación</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="published_at" class="form-control datetimepicker-input"
                                data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cateories">Categorías</label>
                        <select class="form-control" name="category_id" id="">

                            <option selected>Selecciones una categoría</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Etiquetas</label>
                        <select class="select2" multiple="multiple" name="tags[]" data-placeholder="Selecciona una o más etiquetas"
                            style="width: 100%;">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->nombre }}</option>

                            @endforeach

                        </select>
                    </div>



                    <div class="form-group">
                        <label for="contenido">Extracto</label>
                        <textarea class="form-control" name="excerpt" placeholder="Ingrese aquí el extracto"
                            rows="3"></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>


                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection

@push('js')

    <script src="{{ asset('/adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
    </script>


    <script>
        $('#reservationdate').datetimepicker({
            format: 'L'
        });


        $(function() {
            // Summernote
            $('#summernote').summernote()


        })

        //Initialize Select2 Elements
        $('.select2').select2()

    </script>
@endpush
