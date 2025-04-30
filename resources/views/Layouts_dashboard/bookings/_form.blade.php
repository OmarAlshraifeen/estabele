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
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" class="form-control" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ (old('user_id', $booking->user_id ?? '') == $user->id) ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="horse_id" class="form-label">Horse</label>
        <select name="horse_id" class="form-control" required>
            @foreach ($horses as $horse)
                <option value="{{ $horse->id }}"
                    {{ (old('horse_id', $booking->horse_id ?? '') == $horse->id) ? 'selected' : '' }}>
                    {{ $horse->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="path_id" class="form-label">Path</label>
        <select name="path_id" class="form-control" required>
            @foreach ($paths as $path)
                <option value="{{ $path->id }}"
                    {{ (old('path_id', $booking->path_id ?? '') == $path->id) ? 'selected' : '' }}>
                    {{ $path->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="start_time" class="form-label">Start Time</label>
        <input type="datetime-local" name="start_time" class="form-control"
            value="{{ old('start_time', isset($booking) ? \Carbon\Carbon::parse($booking->start_time)->format('Y-m-d\TH:i') : '') }}"
            required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-control" required>
            @foreach (['pending', 'confirmed', 'cancelled'] as $status)
                <option value="{{ $status }}"
                    {{ (old('status', $booking->status ?? '') == $status) ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
