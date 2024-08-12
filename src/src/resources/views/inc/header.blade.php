@php
    use App\Models\Ticket;
@endphp

@props([
    'tickets'=> Ticket::where('user_id',Auth::user()->id)->whereNotNull('message')->get(),
])

<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <img src="{{ asset('accueil/img/logo.jpg') }}" alt="" width="30px" height="30px" style="border-radius: 50%;border:1px solid blue;" >
            <b>VTicket</b>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>


                <div class="dropdown for-message">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-primary">{{ $tickets->count() }}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="message">
                        @if($tickets->count())
                            <p class="red">Vous avez {{ $tickets->count() }} nouveaux messages</p>
                            @foreach($tickets as $ticket)
                                <div class="dropdown-item media" >
                                    <div class="message media-body">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex   align-items-center">
                                                <p class="gap-2">{{ $ticket->message }}</p>
                                                <form action="{{ route('delete.message') }}" method="POST" style="display:inline; margin-left:1rem;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $ticket->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <span class="time ml-3">{{ $ticket->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Aucun nouveau message</p>
                        @endif

                    </div>
                </div>
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ asset('images/admin.jpg') }}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="btn " data-toggle="modal" data-target="#editProfile" >Mon profil</a>
                    <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a> -->

                    {{-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                    <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> --}}

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        
                        <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <span style="color: #000;margin-left:-10px;">Deconnexion</span>
                    </x-dropdown-link>
                </form>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- /#header -->

<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Mon profil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
             <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nom complet</label>
                    <input type="text" class="form-control" id="recipient-name" name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Telephone</label>
                    <input type="text" class="form-control" id="recipient-name" name="telephone" value="{{ Auth::user()->telephone }}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Adresse</label>
                    <input type="text" class="form-control" id="recipient-name" name="adresse" value="{{ Auth::user()->adresse }}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email</label>
                    <input type="email" class="form-control" id="recipient-name" name="email" value="{{ Auth::user()->email }}">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>

            </form> 
            
        </div>
        </div>
    </div>
    <style>
        @media (max-width:390px){
            .header-left .dropdown .dropdown-menu{
                right: -4rem !important;
            }
        }
    </style>
</div>