<x-app-layout>
  <x-header-nav />

  <x-page-content>
    <h3 id="mallsTitle">Malls</h3>
    <div class="row">
      <div class="col-12 col-lg-6">
        <form action="{{ route('malls.store') }}" method="post">
          @csrf
          <div class="form-group mb-2">
            <label for="name" class="mb-2">Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group mb-3">
            <label for="description" class="mb-2">Description</label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
          </div>
          <a href="/dashboard" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </x-page-content>
</x-app-layout>