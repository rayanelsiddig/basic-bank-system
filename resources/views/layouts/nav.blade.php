<nav class="navbar navbar-expand-sm ">
        <div class="container-fluid ">
            <a class="navbar-brand " href="{{url('/')}}">Basic Bank system</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers-list') }}">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('all-transcations')}}">Bank Trasactions</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>