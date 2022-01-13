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
                @foreach ($experience as $eachExperience)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 text-danger">
                                <img src="/images/{{ $eachExperience->image }}" />
                                {{ $eachExperience->title }}
                            </h4>
                            <hr>
                            <p>
                                @foreach ($eachExperience->descriptions as $description)
                                    @if (!empty($description->desc))
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
                            Thesis topic: Design and fabrication of a robotic finger.For more
                            information click on PROJECTS topic.
                        </a>

                        <p class="mt-2">
                            Iran University of Science and Technology is one of the best universities of Iran based on
                            international rankings such as QS,
                            and Times Higher Education.
                            Iran University of Science and Technology is one of the best universities of Iran based on US
                            news,QS,
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
                @foreach ($publication as $eachPublication)
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <div class="flex-grow-1">
                            <h4 class="text-danger mb-3">
                                <a href="http://www.iust.ac.ir/">
                                    @if (!empty($eachPublication->title))
                                        {{ $eachPublication->title }}
                                        <br>
                                    @endif
                                </a>
                            </h4>
                            <p>
                                @if (!empty($eachPublication->desc))
                                    • {{ $eachPublication->desc }}
                                    <br>
                                @endif
                                @if (!empty($eachPublication->desc2))
                                    • {{ $eachPublication->desc2 }}
                                    <br>
                                @endif
                                @if (!empty($eachPublication->desc3))
                                    • {{ $eachPublication->desc3 }}
                                    <br>
                                @endif
                                @if (!empty($eachPublication->desc4))
                                    • {{ $eachPublication->desc4 }}
                                    <br>
                                @endif
                                @if (!empty($eachPublication->desc5))
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
                @foreach ($skill as $eachSkill)
                    <div class="subheading mb-3 text-danger">
                        Programming Languages and Tools
                    </div>
                    <p class="justify-center">
                        @if (!empty($eachSkill->desc))
                            • {{ $eachSkill->desc }}
                            <br>
                        @endif
                        @if (!empty($eachSkill->desc2))
                            • {{ $eachSkill->desc2 }}
                            <br>
                        @endif
                        @if (!empty($eachSkill->desc2))
                            • {{ $eachSkill->desc3 }}
                            <br>
                        @endif
                    </p>
                    <div class="subheading mb-3 text-danger">
                        @if (!empty($eachSkill->title2))
                            • {{ $eachSkill->title2 }}
                            <br>
                        @endif
                    </div>
                    <ul class="fa-ul mb-0 justify-center">
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            @if (!empty($eachSkill->desc4))
                                • {{ $eachSkill->desc4 }}
                                <br>
                            @endif
                            @if (!empty($eachSkill->desc5))
                                • {{ $eachSkill->desc5 }}
                                <br>
                            @endif
                            @if (!empty($eachSkill->desc6))
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
                @foreach ($refree as $eachRefree)
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
                                    <a href="{{ $eachRefree->link }}">
                                        {{-- Regree Name For Link --}}
                                        {{ $eachRefree->name }}
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-2">
                                <img style="width:100%;height:100%;margin-bottom:0.4em"
                                    src="images/{{ $eachRefree->image }}" />
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </section>
    </div>
@endsection
