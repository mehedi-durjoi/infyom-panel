@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/veiculosServicos.singular')
        </h1>
        {{ Breadcrumbs::render('veiculosServicos.show', $veiculosServicos) }}
        <br>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('veiculos_servicos.show_fields')
                    <a href="{{ route('veiculosServicos.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
