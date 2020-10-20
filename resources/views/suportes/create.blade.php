@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cadastrar @lang('models/suportes.singular')
        </h1>
        {{ Breadcrumbs::render('suportes.create') }}
        <br>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'suportes.store']) !!}

                        @include('suportes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
