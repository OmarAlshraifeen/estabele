<form action="{{ $route }}" method="POST">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Stable Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $stable->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <textarea name="location" class="form-control" required>{{ old('location', $stable->location ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="admin_id" class="form-label">Admin</label>
        <select name="admin_id" class="form-control" required>
            @foreach ($admins as $admin)
                <option value="{{ $admin->id }}"
                    {{ (old('admin_id', $stable->admin_id ?? '') == $admin->id) ? 'selected' : '' }}>
                    {{ $admin->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
