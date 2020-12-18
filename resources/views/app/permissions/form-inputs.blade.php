@php $editing = isset($permission) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="role_id" label="Role" required>
            @php $selected = old('role_id', ($editing ? $permission->role_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Role</option>
            @foreach($roles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="slug"
            label="Slug"
            value="{{ old('slug', ($editing ? $permission->slug : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $permission->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.checkbox
            name="enable"
            label="Enable"
            :checked="old('enable', ($editing ? $permission->enable : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>
</div>
