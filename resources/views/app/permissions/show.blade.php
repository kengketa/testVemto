@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('permissions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.permissions.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.permissions.inputs.role_id')</h5>
                    <span>{{ optional($permission->role)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.permissions.inputs.slug')</h5>
                    <span>{{ $permission->slug ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.permissions.inputs.description')</h5>
                    <span>{{ $permission->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.permissions.inputs.enable')</h5>
                    <span>{{ $permission->enable ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('permissions.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Permission::class)
                <a
                    href="{{ route('permissions.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
