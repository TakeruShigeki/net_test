<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            問題編集
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{route('quiz.update', $quiz)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="w-full flex flex-col">
                    <label for="note" class="font-semibold leading-none mt-4">問題文</label>
                    <textarea name="note" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="note" rows="10">{{old('note', $quiz->quiz)}}</textarea>
                </div>
                <div class="w-full flex flex-col">
                    @php
                    $choicesId=0;
                    $checkId=5;
                    @endphp
                    <label class="font-semibold leading-none mt-4">選択</label>
                    <!--ここから選択肢を５個を一度に編集する処理-->
                        @foreach ($quiz->choices as $key => $choice)
                            @php
                            $choicesId +=1;
                            $checkId +=1
                            @endphp
                            {{$choicesId}}
                            @if($choice->anser_flag==1)
                                <input type="checkbox" name={{$checkId}} checked="checked">
                            @else
                                <input type="checkbox" name={{$checkId}}>
                            @endif
                            <textarea name={{$choicesId}} class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="{{$choicesId}}" rows="1" required>{{ $choice->answer }}</textarea>
                            
                            <label class="font-semibold leading-none mt-4">解説</label>
                            <textarea name="commentary" class="w-auto py-2 placeholder-gray-300 border  rounded-md" rows="10" required>{{old('importance',$choice->importance)}}</textarea>
                        @endforeach
                    <!--ここまで-->

                </div>
                <x-primary-button class="mt-4">
                    送信する
                </x-primary-button>

            </form>
        </div>
    </div>


</x-app-layout>