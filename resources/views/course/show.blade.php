<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses at Patrik Solutions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">


                <a href="{{ route('create.lesson', $course) }}" class="btn btn-primary mb-4">Add a Lesson to this
                    Course</a>
                @if (session('success'))
                    <div class="toast toast-custom bg-success text-white" role="alert" aria-live="assertive"
                        aria-atomic="true" data-delay="5000">
                        <div class="toast-header">
                            <strong class="me-auto">Success</strong>
                            <small>Just now</small>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @if (empty($lessons))
                        <p>This Course has no Lessons in it</p>
                    @endif
                    {{-- @dd($lessons) --}}
                    @foreach ($lessons as $lesson)
                        <div class="col">
                            <div class="card">

                                <img src="{{ asset('assets/logos/patrick_logo.png') }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->course_name }}</h5>
                                    <p class="card-text">{{ $course->course_description }}</p>
                                    <a href="{{ route('course.show', $course) }}" class="btn btn-primary">View
                                        Lessons</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>