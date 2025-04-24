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
        <label for="name" class="form-label">Path Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $path->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="duration_minutes" class="form-label">Duration (Minutes)</label>
        <input type="number" name="duration_minutes" class="form-control" value="{{ old('duration_minutes', $path->duration_minutes ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price (USD)</label>
        <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $path->price ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" required>{{ old('description', $path->description ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="stable_id" class="form-label">Stable</label>
        <select name="stable_id" class="form-control" required>
            @foreach ($stables as $stable)
                <option value="{{ $stable->id }}"
                    {{ (old('stable_id', $path->stable_id ?? '') == $stable->id) ? 'selected' : '' }}>
                    {{ $stable->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
