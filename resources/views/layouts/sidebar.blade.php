<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/brand/logo-white.png') }}" height="70"
                    class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/icon-white.png') }}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ asset('assets/images/brand/icon-dark.png') }}" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ asset('assets/images/brand/logo-dark.png') }}" height="60"
                    class="header-brand-img light-logo1" alt="logo" style="border-radius: 10px;">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('pigeons.index') }}">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label">
                            {{ __('My pigeons') }}
                        </span>
                    </a>
                </li>
                <li class="sub-category">
                    <h3>
                        --
                    </h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-package"></i>
                        <span class="side-menu__label">
                            {{ __('Pigeons') }}
                        </span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li>
                                                <a href="{{ route('pigeons.statistics') }}" class="slide-item">
                                                    {{ __('Statistics') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="slide-item">
                                                    {{ __('Images') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('pigeons.public') }}" class="slide-item">
                                                    {{ __('Public pigeons') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-heart"></i>
                        <span class="side-menu__label">
                            {{ __('Breeding') }}
                        </span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li>
                                                <a href="{{ route('seasons') }}" class="slide-item">
                                                    {{ __('Seasons') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('pairs') }}" class="slide-item">
                                                    {{ __('Pairs') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('teams') }}">
                        <i class="side-menu__icon fe fe-users"></i>
                        <span class="side-menu__label">
                            {{ __('Teams') }}
                        </span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-flag"></i>
                        <span class="side-menu__label">
                            {{ __('Racing') }}
                        </span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li>
                                                <a href="{{ route('races') }}" class="slide-item">
                                                    {{ __('Races') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('race.tools') }}" class="slide-item">
                                                    {{ __('Race tools') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-map-pin"></i>
                        <span class="side-menu__label">
                            {{ __('Stations') }}
                        </span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li>
                                                <a href="#!" class="slide-item">
                                                    {{ __('Stations') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="slide-item">
                                                    {{ __('My loft') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-book"></i>
                        <span class="side-menu__label">
                            {{ __('Journals') }}
                        </span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li>
                                                <a href="#!" class="slide-item">
                                                    {{ __('Daily journal') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="slide-item">
                                                    {{ __('Medications') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="slide-item">
                                                    {{ __('Pigeon comments') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="slide-item">
                                                    {{ __('Pair comments') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="slide-item">
                                                    {{ __('Team comments') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="#!">
                        <i class="side-menu__icon fe fe-phone"></i>
                        <span class="side-menu__label">
                            {{ __('Contacts') }}
                        </span>
                    </a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
<!--/APP-SIDEBAR-->
