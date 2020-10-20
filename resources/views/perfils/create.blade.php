@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cadastrar @lang('models/perfils.singular')
        </h1>
        {{ Breadcrumbs::render('perfils.create') }}
        <br>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'perfils.store']) !!}

                        @include('perfils.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
