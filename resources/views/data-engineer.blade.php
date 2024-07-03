<x-layout>
    <div class="container-object">
        @foreach ($exams as $index => $exam)
            <div class="container-question">
                <div class="question">
                    <div class="question-number">{{ $index + 1 }}</div>
                    <div class="question-text">
                        <p class="card-text">{!! str_replace('(//img url)', '<br><br><img src=', str_replace('(img url//)', '><br><br>', $exam->question)) !!}
                        </p>
                    </div>
                    <div class="question-options">
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
                    </div>
                </div>
                <div class="buttons">
                    <div class="show-answer"><button class="show-answer-btn" id="{{ $exam->answer }}">Show Answer</button></div>
                    <div class="ask-gbt"><button class="ask-gbt-btn">Ask GBT</button></div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.show-answer-btn').on('click', function() {
                var $questionContainer = $(this).closest('.container-question').find('.question'); // Find the closest question container
                var correctAnswer = $(this).attr('id'); // Get the correct answer ID (A, B, C, etc.)

                if ($(this).text() === 'Show Answer') {
                    $(this).text('Hide Answer');

                    // Find the corresponding choice item and highlight it within the current question container
                    $questionContainer.find('.multi-choice-letter[data-choice-letter="' + correctAnswer + '"]').parent().addClass('correct-answer');
                } else {
                    $(this).text('Show Answer');

                    // Remove highlighting from all options within the current question container
                    $questionContainer.find('.multi-choice-item').removeClass('correct-answer');
                }
            });
        });
    </script>
</x-layout>
