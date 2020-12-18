@php $editing = isset($role) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $role->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $role->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
