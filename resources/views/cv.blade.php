@extends('layouts.styleScript')

@section('content')
    <!-- Sidebar And Navgiation bar -->
    <x-sidebar>
        <x-slot name="cv_titles">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('Experience')">Experience</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('Education')">Education</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('Publication')">Publication &
                    Presentation</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('Interests')">Fields Of
                    Interests</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('Skills')">Skills</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="goto('Refrees')">Refrees</a></li>
        </x-slot>
    </x-sidebar>

    <!-- Page Content-->
    <div class="container-fluid p-0">

        <!-- Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h3><i class="fa fa-history"></i> Experience </h3>
                @foreach ($experiences as $experience)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 text-danger">
                                <img src="/images/{{ $experience->image }}" />
                                {{ $experience->title }}
                            </h4>
                            <hr>
                            <p>

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
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">

                        <h4 class="mb-0">
                            <a href="http://www.iust.ac.ir/">
                                <i class="fa fa-university"></i>
                                Iran University of Science and Technology (IUST)
                            </a>
                        </h4>

                        <div class="subheading mb-3">
                            <p>Bachelor of Mechanical Engineering</p>
                        </div>

                        <p> GPA: 17.54 / 20 (3.8/4) (last two years). Total GPA of courses related to mechatronics: 3.9 </p>

                        <p>TOEFL score: 98 out of 120 (R:24, L:28, S:24, W, 22).</p>

                        <a class="text-primary">
                            Thesis topic: Design and fabrication of a robotic finger. For more
                            information click on PROJECTS topic.
                        </a>

                        <p class="mt-2">
                            Iran University of Science and Technology is one of the best universities of Iran based on
                            international rankings such as QS,
                            and Times Higher Education.
                        </p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">june 2014 to 2019</span></div>
                </div>
            </div>
        </section>
        <hr class="m-0" />



        <!-- Publications and Conference Presentations -->
        <section class="resume-section" id="publication">
            <div class="resume-section-content">
                <h3 class="mb-3"><i class="fa fa-file-powerpoint"></i> Publications and Conference Presentations
                </h3>
                <!-- style="background-color:rgb(250, 207, 207); padding:20px" -->
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <div class="flex-grow-1">
                        <h4 class="text-danger mb-3">
                            <a href="http://www.iust.ac.ir/">
                                Publications and Conference
                                Presentations
                            </a>
                        </h4>
                        <p> • Aviation Biofuels, second National Renewable Energy Award, July 2018. </p>
                        <p> • Design and Fabrication of a New Robot Finger, Biennial International Experimental Solid
                            Mechanics Conference 2017, Tehran, Iran. </p>
                        <p> • Sina-flex calibration using machine learning methods. (ongoing project). </p>
                    </div>
                </div>
            </div>
        </section>
        <hr class="m-0" />

        <!-- Interests-->
        <section class="resume-section resume-section-bg" id="interests">
            <div class="resume-section-content">
                <h4 class="test-danger"><i class="fa fa-thumbs-up"></i> Fields Of Interests</h4>
                <div class="row">
                    <div class="col-md-4">
                        <img style="margin-top:3.5em" class="interestField_image" src="images/robatic_arm.jpg" />
                    </div>
                    <div class="col-md-4">
                        <p class="mb-2">
                            • Robotics
                            <br>
                            • Control Engineering
                        </p>
                        <img class="interestField_image" src="images/robatic.jpg" />

                    </div>
                    <div class="col-md-4">
                        <p class="mb-2">
                            • Machine Learning
                            <br>
                            • Optimization
                        </p>
                        <img class="interestField_image" src="images/machinLearning.jpg" />
                    </div>
                </div>
            </div>
        </section>
        <hr class="m-0" />

        <!-- Skills-->
        <section class="resume-section" id="skills">
            <div class="resume-section-content">
                <h3 class="mb-3">
                    <i class="fa fa-cogs"></i>
                    Skills
                </h3>
                @foreach ($skills as $skill)
                    <div class="subheading mb-3">
                        {{ $skill->title ?? null }}
                    </div>
                    <ul id="skillMargin" class="fa-ul justify-center">
                        <li>
                            @foreach ($skill->explanations as $description)
                                <p> {{ $description->explanation }} </p>
                            @endforeach
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
                @foreach ($refrees as $refree)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                        <div class="d-flex flex-column flex-md-row justify-content-between">
                            <div class="col-md-10">
                                <h4 class="mb-0 text-secondary">
                                    {{-- Refree Name --}}
                                    {{ $refree->name }}
                                </h4>
                                <br>
                                <p>
                                    {{ $refree->desc }}
                                    {{-- Refree link --}}
                                    <a href="{{ $refree->link }}">
                                        {{-- Regree Name For Link --}}
                                        {{ $refree->name }}
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-2">
                                <img style="width:100%;height:100%;margin-bottom:0.4em"
                                    src="images/{{ $refree->image }}" />
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </section>
    </div>
@endsection
