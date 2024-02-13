<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿の一覧
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    {{-- 投稿一覧表示用のコード --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($quizzes as $quiz)
            <div class="mx-4 sm:p-8">
                <div class="mt-4">
                    <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <a href="{{ route('quiz.edit', $quiz) }}">
                        <x-primary-button class="bg-teal-700 float-right">編集</x-primary-button>
                    </a>
                        <div class="mt-4">
                        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">{{ $quiz->quiz }}</h1>
                            <hr class="w-full">
                        </div>
                    </div>
                </div>
            </div>
            <p>選択肢</p>
                @foreach ($quiz->choices as $key => $choice)
                    <span>{{$key+1}}.{{ $choice->answer}}</span>
                    <p class="text-xl font-semibold">解説</p>
                <p>{!! nl2br(htmlspecialchars($choice->importance)) !!}</p>
                    @if($choice->answer_flag ==1)
                    <span class="text-red-400">正解</span>
                    @endif
                    <br>
                @endforeach
            </div>
        @endforeach
    </div>
</x-app-layout> 