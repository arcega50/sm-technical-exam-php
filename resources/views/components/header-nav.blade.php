<div class="bg-primary text-white d-flex justify-content-between">
    <div class="p-3 align-self-center">
        Welcome back, {{ auth()->user()->name }}
    </div>
    <div class="p-3">
        <a href="/logout" type="button" class="btn btn-outline-light">
        <i class="bi-box-arrow-right"></i>
        <span class="mx-1">Logout</span>
        </a>
    </div>
</div>