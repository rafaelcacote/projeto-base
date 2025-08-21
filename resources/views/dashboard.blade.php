@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <!-- BEGIN PAGE HEADER -->
        @can('dashboard.acessar')
            <div class="page-header d-print-none" aria-label="Page header">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">DashBoard - Usuário com acesso</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                <div class="container-xl">
                    <!-- Content here -->
                </div>
            </div>
            <!-- END PAGE BODY -->
        @endcan
        @cannot('dashboard.acessar')
            <div class="alert alert-warning" role="alert">
                Você não tem permissão para acessar este conteúdo.
            </div>
        @endcannot
    </div>
@endsection
