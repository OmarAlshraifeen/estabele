@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $route }}" method="POST">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Horse Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $horse->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" name="type" class="form-control" value="{{ old('type', $horse->type ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="stable_id" class="form-label">Stable</label>
        <select name="stable_id" class="form-control" required>
            @foreach ($stables as $stable)
                <option value="{{ $stable->id }}"
                    {{ (old('stable_id', $horse->stable_id ?? '') == $stable->id) ? 'selected' : '' }}>
                    {{ $stable->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
