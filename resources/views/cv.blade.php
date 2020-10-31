@extends('layouts.styleScript')

@section('content')
    <!-- Sidebar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Pouya Samandi</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="images/pouya2.jpeg" alt="" /></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li id="CV" class="text-white">CV</li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('experience')">Experience</a>
                </li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('education')">Education</a>
                </li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('publication')">Publications &
                        Presentations</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('interests')">Fields of
                        Interests</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('skills')">Skills</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('refrees')">Refrees</a></li>
            </ul>
        </div>
    </nav>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top navBarStyle">
        <a class="navbar-brand text-white" href="/">Pouya Samandi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/cv">CV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/project">Projects</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" onclick="goto('footer')">Contact me <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h3 class="my-5"><i class="fa fa-history"></i> Experience 
                </h3>
                @foreach($experience as $eachExperience)
                    <div style="margin-top:-1em" class="d-flex flex-column flex-md-row justify-content-between mb-3">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 text-danger">
                                <img src="/images/{{ $eachExperience->image }}" />
                                {{ $eachExperience->title }}
                            </h4>
                            <hr>
                            <p>
                                @foreach($eachExperience->description as $description)
                                    @if(!empty($description->desc))
                                        • {{ $description->desc }}
                                        <br>
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <hr class="m-0" />
        <!-- Education-->
        <section class="resume-section resume-section-bg" id="education">
            <div style="margin-bottom:-3.5em" class="resume-section-content">
                <h3 class="mb-4"><i class="fas fa-book-open"></i> Education</h3>
                @foreach($education as $eachEducation)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 text-danger">
                                <a href="http://www.iust.ac.ir/">
                                    <i class="fa fa-university"></i>
                                    {{ $eachEducation->name }}
                                </a>
                            </h4>
                            <div class="subheading mb-3">{{ $eachEducation->degree }}</div>
                            <p>
                                {{ $eachEducation->GPA }}
                                <br>
                                {{ $eachEducation->TOEFL }}
                                <br>
                                <a class="text-primary">{{ $eachEducation->Thesis_topic }}</a>
                                <br>
                                <br>
                                {{ $eachEducation->university_desc }}
                            </p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">june 2014 to present(one semester left)</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <hr class="m-0" />
        <!-- Publications and Conference Presentations -->
        <section class="resume-section" id="publication">
            <div class="resume-section-content">
                <h3 class="mb-3"><i class="fa fa-file-powerpoint"></i> Publications and Conference Presentations</h3>
                @foreach($publication as $eachPublication)
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <div class="flex-grow-1">
                            <h4 class="text-danger mb-3">
                                <a href="http://www.iust.ac.ir/">
                                    @if(!empty($eachPublication->title))
                                        {{ $eachPublication->title }}
                                        <br>
                                    @endif
                                </a>
                            </h4>
                            <p>
                                @if(!empty($eachPublication->desc))
                                    • {{ $eachPublication->desc }}
                                    <br>
                                @endif
                                @if(!empty($eachPublication->desc2))
                                    • {{ $eachPublication->desc2 }}
                                    <br>
                                @endif
                                @if(!empty($eachPublication->desc3))
                                    • {{ $eachPublication->desc3 }}
                                    <br>
                                @endif
                                @if(!empty($eachPublication->desc4))
                                    • {{ $eachPublication->desc4 }}
                                    <br>
                                @endif
                                @if(!empty($eachPublication->desc5))
                                    • {{ $eachPublication->desc5 }}
                                    <br>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <hr class="m-0" />
        <!-- Interests-->
        <section class="resume-section resume-section-bg interests" id="interests">
            <div class="resume-section-content">
                <h4 class="test-danger"><i class="fa fa-thumbs-up"></i> Fields Of Interests</h4>
                @foreach($interest as $eachInterest)
                    <div class="row">
                        <div class="col-md-4">
                            <img class="interestField_image mt-4em" src="images/{{ $eachInterest->image }}" />
                        </div>
                        <div class="col-md-4">
                            <p>
                                @if(!empty($eachInterest->desc))
                                    • {{ $eachInterest->desc }}
                                    <br>
                                @endif
                                @if(!empty($eachInterest->desc2))
                                    • {{ $eachInterest->desc2 }}
                                    <br>
                                @endif
                            </p>
                            <img class="interestField_image" src="images/{{ $eachInterest->image2 }}" />
                        </div>
                        <div class="col-md-4">
                            <p>
                                @if(!empty($eachInterest->desc))
                                    • {{ $eachInterest->desc3 }}
                                    <br>
                                @endif
                                @if(!empty($eachInterest->desc2))
                                    • {{ $eachInterest->desc4 }}
                                    <br>
                                @endif
                            </p>
                            <img class="interestField_image" src="images/{{ $eachInterest->image3 }}" />
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <hr class="m-0" />
        <!-- Skills-->
        <section class="resume-section" id="skills">
            <div class="resume-section-content justify-center">
                <h3 class="mb-3">
                    <i class="fa fa-cogs"></i>
                    Skills
                </h3>
                @foreach($skill as $eachSkill)
                    <div class="subheading mb-3 text-danger">
                        Programming Languages and Tools
                    </div>
                    <p>
                        @if(!empty($eachSkill->desc))
                            • {{ $eachSkill->desc }}
                            <br>
                        @endif
                        @if(!empty($eachSkill->desc2))
                            • {{ $eachSkill->desc2 }}
                            <br>
                        @endif
                        @if(!empty($eachSkill->desc2))
                            • {{ $eachSkill->desc3 }}
                            <br>
                        @endif
                    </p>
                    <div class="subheading mb-3 text-danger">
                        @if(!empty($eachSkill->title2))
                            • {{ $eachSkill->title2 }}
                            <br>
                        @endif
                    </div>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            @if(!empty($eachSkill->desc4))
                                • {{ $eachSkill->desc4 }}
                                <br>
                            @endif
                            @if(!empty($eachSkill->desc5))
                                • {{ $eachSkill->desc5 }}
                                <br>
                            @endif
                            @if(!empty($eachSkill->desc6))
                                • {{ $eachSkill->desc6 }}
                                <br>
                            @endif
                        </li>
                    </ul>
                @endforeach
            </div>
        </section>
        <hr class="m-0" />
        <!-- Refrees -->
        <section class="resume-section resume-section-bg" id="refrees">
            <div class="resume-section-content justify-center">
                <h3 class="mb-5">Referees</h3>
                @foreach($refree as $eachRefree)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                        <div class="d-flex flex-column flex-md-row justify-content-between">
                            <div class="col-md-10">
                                <h4 class="mb-0 text-secondary">
                                    {{-- Refree Name --}}
                                    {{ $eachRefree->name }}
                                </h4>
                                <br>
                                <p>
                                    {{ $eachRefree->desc }}
                                    {{-- Refree link --}}
                                    <a style="color:blue" href="{{ $eachRefree->link }}">
                                        {{-- Regree Name For Link --}}
                                        {{ $eachRefree->name }}
                                    </a> 
                                </p>
                            </div>
                            <div class="col-md-2">
                                <img style="width:100%;height:100%;margin-bottom:0.4em" src="images/{{ $eachRefree->image }}" />
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </section>
    </div>
@endsection


