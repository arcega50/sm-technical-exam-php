<x-app-layout>
  <x-header-nav />

  <x-page-content>

    <div class="d-flex justify-content-between">
      <h3 id="mallsTitle">Malls</h3>
      <a href="/malls/create" class="btn btn-primary mb-2">
        <i class="bi-plus"></i>
        Add Mall</a>
    </div>
    <table class="table" aria-describedby="mallsTitle">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($malls as $mall)
          <tr>
            <td>{{ $mall->name }}</td>
            <td>{{ $mall->description ?? 'No description available' }}</td>
            <td>
              <a href="{{ route('malls.edit', $mall) }}" class="btn btn-primary btn-sm">
                <i class="bi-pencil-square"></i>
                <span class="mx-1">Edit</span>
              </a>
              <button class="btn btn-danger btn-sm">
                <i class="bi-trash"></i>
                <span class="mx-1">Delete</span>
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3">No malls available.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </x-page-content>
</x-app-layout>