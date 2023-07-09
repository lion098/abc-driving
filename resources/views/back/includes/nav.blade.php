<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('cms.dashboard.index')}}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('cms.about.index')}}">
                        <i class="fa-solid fa-building me-2"></i>About Us
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (auth('cms')->user()->type == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('cms.staffs.index')}}">
                            <i class="fa-solid fa-users me-2"></i>Staffs
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('cms.courses.index')}}">
                        <i class="fa-solid fa-car me-2"></i>Courses
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('cms.clients.index')}}">
                        <i class="fa-solid fa-users-between-lines me-2"></i>Clients
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('cms.slider.index')}}">
                        <i class="fa-solid fa-sliders me-2"></i>Slider
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('cms.testimonial.index')}}">
                        <i class="fa-solid fa-quote-left me-2"></i>Testimonial
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (auth('cms')->user()->type == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('cms.feature.index')}}">
                            <i class="fa-solid fa-check-double me-2"></i>Features
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (auth('cms')->user()->type == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('cms.contacts.index')}}">
                            <i class="fa-solid fa-address-book me-2"></i>Contacts
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (auth('cms')->user()->type == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('cms.sitesetting.index')}}">
                            <i class="fa-solid fa-gears me-2"></i>Site Settings
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-user-circle me-2"></i>{{auth('cms')->user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('cms.profile.edit')}}"><i class="fa-solid fa-user me-2"></i>Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('cms.password.edit')}}"><i class="fa-solid fa-lock me-2"></i>Change Password</a></li>
                        <hr style="margin-bottom: -2px; margin-top: 11px">
                        <li>
                            <form action="{{route('cms.logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link dropdown-item"><i class="fa-solid fa-right-to-bracket me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
