<x-layout>
    <div class="container py-md-5 container--narrow">

        @foreach ($exams as $exam)
            <div class="question-discussion-header">{{ $exam->question_number }}<br></div>
            <div class="question-body mt-3 pt-3">
                <p class="card-text">{!! str_replace('(//img url)', '<br><br><img src=', str_replace('(img url//)', '><br><br>', $exam->question)) !!}
                </p>
                <div class="question-choices-container">
                    <ul>
                        @if ($exam->option_a)
                            <li class="multi-choice-item"><span class="multi-choice-letter"
                                    data-choice-letter="A"></span>{{ $exam->option_a }}</li>
                        @endif
                        @if ($exam->option_b)
                            <li class="multi-choice-item"><span class="multi-choice-letter"
                                    data-choice-letter="B"></span>{{ $exam->option_b }}</li>
                        @endif
                        @if ($exam->option_c)
                            <li class="multi-choice-item"><span class="multi-choice-letter"
                                    data-choice-letter="C"></span>{{ $exam->option_c }}</li>
                        @endif
                        @if ($exam->option_d)
                            <li class="multi-choice-item"><span class="multi-choice-letter"
                                    data-choice-letter="D"></span>{{ $exam->option_d }}</li>
                        @endif
                        @if ($exam->option_e)
                            <li class="multi-choice-item"><span class="multi-choice-letter"
                                    data-choice-letter="E"></span>{{ $exam->option_e }}</li>
                        @endif
                        @if ($exam->option_f)
                            <li class="multi-choice-item"><span class="multi-choice-letter"
                                    data-choice-letter="F"></span>{{ $exam->option_f }}</li>
                        @endif
                    </ul>
                </div><button class="toggle-answer-btn btn btn-primary">Show Answer</button>
                <div class="card-text question-answer bg-light white-text hidden">
                    <span class="vote-answer-box"><strong>Most Voted Answer:</strong><span
                            class="vote-answer">{{ $exam->answer }}</span>
                    </span><br><br><br><br>
                </div>
            </div>
        @endforeach

    </div>
</x-layout>
