<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <h5 style="display:none;">
                {{-- @if (auth()->user()->trial_until) --}}
                    <span class="nav-link badge badge-light-danger" id="timeTrial"></span>
                    <a class="nav-link badge badge-primary" href="/upgrade">Upgrade now</a>
                {{-- @endif --}}
            </h5>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ ucwords(auth()->user()->name) }}</span><span class="user-status">{{ auth()->user()->roles->pluck('name')->implode(',') }}</span></div><span class="avatar"><img class="round" src="{{ asset('storage/images/users').'/'.auth()->user()->profile_photo_path }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('userssetting.index') }}"><i class="mr-50" data-feather="user"></i> Profile</a>
                    {{-- <a class="dropdown-item" href="{{ route('chats.index') }}"><i class="mr-50" data-feather="message-square"></i> Chats</a> --}}
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="{{ route('userssetting.index') }}"><i class="mr-50" data-feather="settings"></i> Settings</a> --}}

                    @if (auth()->id())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit(); " role="button">
                                    <i class="mr-50" data-feather="power"></i>

                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </form>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
        </a></li>
</ul>

@push('page-js')
<script type="text/javascript">
    var time = '{{ auth()->user()->trial_until ?? 0  }}';
    try {
        $(document).ready(function(){
            countDownDate = new Date(time);
            var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("timeTrial").innerHTML = days + " Days "+ hours + " Hours "+ minutes + " Minutes " + seconds + " Seconds ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timeTrial").innerHTML = "EXPIRED";
            }
            }, 1000);
        });
    } catch (error) {
        console.log('no trial until');
    }
</script>
@endpush
