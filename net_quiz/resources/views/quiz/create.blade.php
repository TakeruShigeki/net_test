<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            問題作成
        </h2>
        <x-input-error class="mb-4" :messages="$errors->all()"/>
        <x-message :message="session('message')" />
        
    </x-slot>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
                <form method="post" action="{{route('quiz.store')}}" enctype="multipart/form-data"> @csrf
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                        <label for="quiz" class="font-semibold leading-none mt-4">問題</label>
                        <input type="text" name="quiz" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="quiz" placeholder="Enter Title">
                        </div>
                    </div>
                    <?php
                    $choicesID=array(
                        '1'=>'choice1',
                        '2'=>'choice2',
                        '3'=>'choice3',
                        '4'=>'choice4',
                    );
                    ?>
                    
                    @foreach($choicesID as $key=>$choice)
                    <input type="checkbox" name={{$key}}>
                    <input type="text" name={{$choice}}>
                    <br>

                    @endforeach
                    <input type="text" name="importance">
                    
                    

                    <x-primary-button class="mt-4">
                        送信する
                    </x-primary-button>
                    
                </form>
            </div>
        </div>
        </x-app-layout>