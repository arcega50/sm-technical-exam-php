<x-app-layout>
  <div class="d-flex justify-content-center w-100 h-100">
    <div class="card w-25 align-self-center">
      <div class="card-header">
        Login
      </div>
      <div class="card-body">
        <x-form-errors />
        <form action="/login" method="post">
          @csrf
          <div class="form-group mb-2">
            <label for="email" class="mb-2">Email</label>
            <input type="email" class="form-control" required name="email">
          </div>
          <div class="form-group mb-3">
            <label for="password" class="mb-2">Password</label>
            <input type="password" class="form-control" required name="password">
          </div>
          <button class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>