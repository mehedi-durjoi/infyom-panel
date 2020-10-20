@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/respostas.singular')
        </h1>
        {{ Breadcrumbs::render('respostas.show', $respostas) }}
        <br>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('respostas.show_fields')
                    <a href="{{ route('respostas.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
