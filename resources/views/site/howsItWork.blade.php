@extends('site.layout')
@section('title', 'Hows it work')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
@endsection
@section('content')
    <!--Inner Home End-->
    <!--Inner Home Banner Start-->
    @include('site.shared.topbanner')
    <!--Inner Home End-->
    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <!--Categories Start-->
        <div class="wt-haslayout">
            <div class="wt-contentwrappers">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                            <div class="wt-howitwork-hold wt-bgwhite wt-haslayout">
                                <ul class="wt-navarticletab wt-navarticletabvtwo nav navbar-nav">
                                    <li class="nav-item">
                                        <a class="active" id="all-tab" data-toggle="tab" href="#forhiring">For Hiring</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="business-tab" data-toggle="tab" href="#forfreelancing">For Freelancing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="trading-tab" data-toggle="tab" href="#faq">FAQ</a>
                                    </li>
                                </ul>
                                <div class="tab-content wt-haslayout">
                                    <div class="wt-contentarticle tab-pane active fade show" id="forhiring">
                                        <div class="row">
                                            <div class="wt-starthiringhold wt-innerspace wt-haslayout">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-7 float-left">
                                                    <div class="wt-starthiringcontent">
                                                        <div class="wt-sectionhead">
                                                            <div class="wt-sectiontitle">
                                                                <h2>For Hiring</h2>
                                                                <span>Start Today For a Great Future</span>
                                                            </div>
                                                            <div class="wt-description">
                                                                <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna
                                                                    aliqua eniina ilukita ylokem lokateise ination voluptate
                                                                    velite esse cillum dolore eu fugnulla pariatur lokaim
                                                                    urianewce animid <a href="javascript:void(0);">Learn
                                                                        more</a></p>
                                                            </div>
                                                        </div>
                                                        <ul class="wt-accordionhold accordion">
                                                            <li>
                                                                <div class="wt-accordiontitle collapsed" id="headingOne"
                                                                    data-toggle="collapse" data-target="#collapseOne">
                                                                    <span>Adipisicing elit, sed do eiusmod tempor
                                                                        incididunt?</span>
                                                                </div>
                                                                <div class="wt-accordiondetails collapse show"
                                                                    id="collapseOne" aria-labelledby="headingOne">
                                                                    <div class="wt-title">
                                                                        <h3>Digital Marketing</h3>
                                                                    </div>
                                                                    <div class="wt-description">
                                                                        <p>Consectetur adipisicing elit sed do eiusmod
                                                                            tempor incididunt ut labore eta dolore magna
                                                                            aliqua. Ut enim ad minim veniam, quis nostrud
                                                                            exercitation ullamco laboris nisi ut aliquip ex
                                                                            ea commodo consequat.
                                                                        </p>
                                                                    </div>
                                                                    <div class="wt-likeunlike">
                                                                        <span>Did you find this useful?</span>
                                                                        <a href="javascript:void(0);" class="wt-like"><i
                                                                                class="fa fa-thumbs-up"></i></a>
                                                                        <a href="javascript:void(0);" class="wt-unlike"><i
                                                                                class="fa fa-thumbs-down"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="wt-accordiontitle collapsed" id="headingtwo"
                                                                    data-toggle="collapse" data-target="#collapsetwo">
                                                                    <span>Dolore magna aliqua enim ad minim veniam?</span>
                                                                </div>
                                                                <div class="wt-accordiondetails collapse" id="collapsetwo"
                                                                    aria-labelledby="headingtwo">
                                                                    <div class="wt-title">
                                                                        <h3>Digital Marketing</h3>
                                                                    </div>
                                                                    <div class="wt-description">
                                                                        <p>
                                                                            Consectetur adipisicing elit sed aeiusmisuod
                                                                            tempor incididunt labore dolore ma alaeiqua enim
                                                                            ade minim veniam quis nostr xecitation
                                                                            ullamcoaris nisi ut aliquipa extaea coedmmmodo
                                                                            equate irure dolawor in reprehenderit.
                                                                        </p>
                                                                    </div>
                                                                    <div class="wt-likeunlike">
                                                                        <span>Did you find this useful?</span>
                                                                        <a href="javascript:void(0);" class="wt-like"><i
                                                                                class="fa fa-thumbs-up"></i></a>
                                                                        <a href="javascript:void(0);" class="wt-unlike"><i
                                                                                class="fa fa-thumbs-down"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="wt-accordiontitle collapsed" id="headingthreea"
                                                                    data-toggle="collapse" data-target="#collapsethree">
                                                                    <span>Quis nostrud exercitation ullamco laboris nisi ut
                                                                        aliquip ex ea commodo?</span>
                                                                </div>
                                                                <div class="wt-accordiondetails collapse" id="collapsethree"
                                                                    aria-labelledby="headingthreea">
                                                                    <div class="wt-title">
                                                                        <h3>Digital Marketing</h3>
                                                                    </div>
                                                                    <div class="wt-description">
                                                                        <p>
                                                                            Consectetur adipisicing elit sed aeiusmisuod
                                                                            tempor incididunt labore dolore ma alaeiqua enim
                                                                            ade minim veniam quis nostr xecitation
                                                                            ullamcoaris nisi ut aliquipa extaea coedmmmodo
                                                                            equate irure dolawor in reprehenderit.
                                                                        </p>
                                                                    </div>
                                                                    <div class="wt-likeunlike">
                                                                        <span>Did you find this useful?</span>
                                                                        <a href="javascript:void(0);" class="wt-like"><i
                                                                                class="fa fa-thumbs-up"></i></a>
                                                                        <a href="javascript:void(0);" class="wt-unlike"><i
                                                                                class="fa fa-thumbs-down"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-5 float-right">
                                                    <div class="wt-howtoworkimg">
                                                        <figure>
                                                            <img src='{{ asset('images/work/img-01.jpg') }}'
                                                                alt="img description">
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="wt-contentarticle tab-pane fade" id="forfreelancing">
                                        <div class="row">
                                            <div class="wt-starthiringhold wt-innerspace wt-haslayout">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-7 float-right">
                                                    <div class="wt-starthiringcontent">
                                                        <div class="wt-sectionhead">
                                                            <div class="wt-sectiontitle">
                                                                <h2>For Freelancing</h2>
                                                                <span>Start Today For a Great Future</span>
                                                            </div>
                                                            <div class="wt-description">
                                                                <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna
                                                                    aliqua eniina ilukita ylokem lokateise ination voluptate
                                                                    velite esse cillum dolore eu fugnulla pariatur lokaim
                                                                    urianewce animid learn <a
                                                                        href="javascript:void(0);">more</a></p>
                                                            </div>
                                                        </div>
                                                        <ul class="wt-accordionhold accordion">
                                                            <li>
                                                                <div class="wt-accordiontitle collapsed" id="headingOneq"
                                                                    data-toggle="collapse" data-target="#collapseOneq">
                                                                    <span>Adipisicing elit, sed do eiusmod tempor
                                                                        incididunt?</span>
                                                                </div>
                                                                <div class="wt-accordiondetails collapse"
                                                                    id="collapseOneq" aria-labelledby="headingOneq">
                                                                    <div class="wt-title">
                                                                        <h3>Digital Marketing</h3>
                                                                    </div>
                                                                    <div class="wt-description">
                                                                        <p>
                                                                            Consectetur adipisicing elit sed aeiusmisuod
                                                                            tempor incididunt labore dolore ma alaeiqua enim
                                                                            ade minim veniam quis nostr xecitation
                                                                            ullamcoaris nisi ut aliquipa extaea coedmmmodo
                                                                            equate irure dolawor in reprehenderit.
                                                                        </p>
                                                                    </div>
                                                                    <div class="wt-likeunlike">
                                                                        <span>Did you find this useful?</span>
                                                                        <a href="javascript:void(0);" class="wt-like"><i
                                                                                class="fa fa-thumbs-up"></i></a>
                                                                        <a href="javascript:void(0);" class="wt-unlike"><i
                                                                                class="fa fa-thumbs-down"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="wt-accordiontitle collapsed" id="headingtwoq"
                                                                    data-toggle="collapse" data-target="#collapsetwoq">
                                                                    <span>Dolore magna aliqua enim ad minim veniam?</span>
                                                                </div>
                                                                <div class="wt-accordiondetails collapse"
                                                                    id="collapsetwoq" aria-labelledby="headingtwoq">
                                                                    <div class="wt-title">
                                                                        <h3>Digital Marketing</h3>
                                                                    </div>
                                                                    <div class="wt-description">
                                                                        <p>
                                                                            Consectetur adipisicing elit sed aeiusmisuod
                                                                            tempor incididunt labore dolore ma alaeiqua enim
                                                                            ade minim veniam quis nostr xecitation
                                                                            ullamcoaris nisi ut aliquipa extaea coedmmmodo
                                                                            equate irure dolawor in reprehenderit.
                                                                        </p>
                                                                    </div>
                                                                    <div class="wt-likeunlike">
                                                                        <span>Did you find this useful?</span>
                                                                        <a href="javascript:void(0);" class="wt-like"><i
                                                                                class="fa fa-thumbs-up"></i></a>
                                                                        <a href="javascript:void(0);" class="wt-unlike"><i
                                                                                class="fa fa-thumbs-down"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="wt-accordiontitle collapsed"
                                                                    id="headingthreeq" data-toggle="collapse"
                                                                    data-target="#collapsethreeq">
                                                                    <span>Quis nostrud exercitation ullamco laboris nisi ut
                                                                        aliquip ex ea commodo?</span>
                                                                </div>
                                                                <div class="wt-accordiondetails collapse"
                                                                    id="collapsethreeq" aria-labelledby="headingthreeq">
                                                                    <div class="wt-title">
                                                                        <h3>Digital Marketing</h3>
                                                                    </div>
                                                                    <div class="wt-description">
                                                                        <p>
                                                                            Consectetur adipisicing elit sed aeiusmisuod
                                                                            tempor incididunt labore dolore ma alaeiqua enim
                                                                            ade minim veniam quis nostr xecitation
                                                                            ullamcoaris nisi ut aliquipa extaea coedmmmodo
                                                                            equate irure dolawor in reprehenderit.
                                                                        </p>
                                                                    </div>
                                                                    <div class="wt-likeunlike">
                                                                        <span>Did you find this useful?</span>
                                                                        <a href="javascript:void(0);" class="wt-like"><i
                                                                                class="fa fa-thumbs-up"></i></a>
                                                                        <a href="javascript:void(0);" class="wt-unlike"><i
                                                                                class="fa fa-thumbs-down"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-5 float-left">
                                                    <div class="wt-howtoworkimg">
                                                        <figure>
                                                            <img src='{{ asset('images/work/img-01.jpg') }}'
                                                                alt="img description">
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wt-contentarticle tab-pane fade" id="faq">
                                        <div class="row">
                                            <div class="wt-starthiringhold wt-innerspace wt-haslayout">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-7 float-left">
                                                    <div class="wt-starthiringcontent">
                                                        <div class="wt-sectionhead">
                                                            <div class="wt-sectiontitle">
                                                                <h2>FAQ</h2>
                                                                <span>Start Today For a Great Future</span>
                                                            </div>
                                                            <div class="wt-description">
                                                                <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna
                                                                    aliqua eniina ilukita ylokem lokateise ination voluptate
                                                                    velite esse cillum dolore eu fugnulla pariatur lokaim
                                                                    urianewce animid learn <a
                                                                        href="javascript:void(0);">more</a></p>
                                                            </div>
                                                        </div>
                                                        <ul class="wt-accordionhold accordion">
                                                            <li>
                                                                <div class="wt-accordiontitle collapsed" id="headingOnea"
                                                                    data-toggle="collapse" data-target="#collapseOnea">
                                                                    <span>Nostrud exercitation ullamco laboris nisi ut
                                                                        aliquip?</span>
                                                                </div>
                                                                <div class="wt-accordiondetails collapse"
                                                                    id="collapseOnea" aria-labelledby="headingOne">
                                                                    <div class="wt-title">
                                                                        <h3>Digital Marketing</h3>
                                                                    </div>
                                                                    <div class="wt-description">
                                                                        <p>
                                                                            Consectetur adipisicing elit sed aeiusmisuod
                                                                            tempor incididunt labore dolore ma alaeiqua enim
                                                                            ade minim veniam quis nostr xecitation
                                                                            ullamcoaris nisi ut aliquipa extaea coedmmmodo
                                                                            equate irure dolawor in reprehenderit.
                                                                        </p>
                                                                    </div>
                                                                    <div class="wt-likeunlike">
                                                                        <span>Did you find this useful?</span>
                                                                        <a href="javascript:void(0);" class="wt-like"><i
                                                                                class="fa fa-thumbs-up"></i></a>
                                                                        <a href="javascript:void(0);" class="wt-unlike"><i
                                                                                class="fa fa-thumbs-down"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="wt-accordiontitle collapsed" id="headingtwoa"
                                                                    data-toggle="collapse" data-target="#collapsetwoa">
                                                                    <span>Commodo consequat aute irure dolor in
                                                                        reprehenderit in voluptate velit?</span>
                                                                </div>
                                                                <div class="wt-accordiondetails collapse"
                                                                    id="collapsetwoa" aria-labelledby="headingtwoa">
                                                                    <div class="wt-title">
                                                                        <h3>Digital Marketing</h3>
                                                                    </div>
                                                                    <div class="wt-description">
                                                                        <p>
                                                                            Consectetur adipisicing elit sed aeiusmisuod
                                                                            tempor incididunt labore dolore ma alaeiqua enim
                                                                            ade minim veniam quis nostr xecitation
                                                                            ullamcoaris nisi ut aliquipa extaea coedmmmodo
                                                                            equate irure dolawor in reprehenderit.
                                                                        </p>
                                                                    </div>
                                                                    <div class="wt-likeunlike">
                                                                        <span>Did you find this useful?</span>
                                                                        <a href="javascript:void(0);" class="wt-like"><i
                                                                                class="fa fa-thumbs-up"></i></a>
                                                                        <a href="javascript:void(0);" class="wt-unlike"><i
                                                                                class="fa fa-thumbs-down"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="wt-accordiontitle collapsed" id="headingthree"
                                                                    data-toggle="collapse" data-target="#collapsethreea">
                                                                    <span>Cillum dolore eu fugiat nulla pariatur?</span>
                                                                </div>
                                                                <div class="wt-accordiondetails collapse"
                                                                    id="collapsethreea" aria-labelledby="headingthree">
                                                                    <div class="wt-title">
                                                                        <h3>Digital Marketing</h3>
                                                                    </div>
                                                                    <div class="wt-description">
                                                                        <p>
                                                                            Consectetur adipisicing elit sed aeiusmisuod
                                                                            tempor incididunt labore dolore ma alaeiqua enim
                                                                            ade minim veniam quis nostr xecitation
                                                                            ullamcoaris nisi ut aliquipa extaea coedmmmodo
                                                                            equate irure dolawor in reprehenderit.
                                                                        </p>
                                                                    </div>
                                                                    <div class="wt-likeunlike">
                                                                        <span>Did you find this useful?</span>
                                                                        <a href="javascript:void(0);" class="wt-like"><i
                                                                                class="fa fa-thumbs-up"></i></a>
                                                                        <a href="javascript:void(0);" class="wt-unlike"><i
                                                                                class="fa fa-thumbs-down"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-4 col-lg-5 float-right">
                                                    <div class="wt-howtoworkimg">
                                                        <figure>
                                                            <img src='{{ asset('images/work/img-01.jpg') }}'
                                                                alt="img description">
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Limitless Experience End-->
    </main>
    <!--Main End-->
@endsection
@section('script')
@endsection
