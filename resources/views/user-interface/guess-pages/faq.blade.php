@extends('user-interface.layout')
@section('title' , $page_content->section_first[0]->content)

@section('content')

    <div class="contact">
        <div class="section-1" style="background-image: url('{!!asset('user-interface')!!}/img/contact-bg.png');">
            <div class="mx-1254 clearfix">

                <div class="contact-holder clearfix">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <h1>FAQ</h1>
                            </div>

                        </div>
                        <?php
                        $lastSection = '';
                        $lastCategory = '';
                        $checkClose = false;

                        $faq = \App\models\FAQs::get();
                        $sections = $faq->pluck('section')->toArray();
                        $categories = $faq->pluck('category')->toArray();

                        $sections = array_unique($sections);
                        $categories = array_unique($categories);

                        ?>

                        <select id="section" class="form-control" style="width: auto" onchange="showQuestions(this)">
                            <option value="0">Select Option</option>
                            @foreach($sections as $section)
                                <option value="{{$section}}">{{$section === 'lessee' ? "IF I WANT TO RENT" : "IF I WANT TO POST" }}</option>
                            @endforeach
                        </select>

                        <br>

                        <select id="section" class="form-control lessee" style="width: auto; display: none;" onchange="showAnswer(this)">
                            <option value="0">Select Question</option>
                            @foreach($faqs as $faq)
                                <?php

                                    if($faq->section === "lessee") {

                                        if($lastCategory != $faq->category){
                                            echo ' <optgroup label="' . strtoupper($faq->category) . '">';
                                            $lastCategory = $faq->category;
                                            $checkClose = false;
                                        }else{
                                            $checkClose = true;
                                        }

                                        echo ' <option value="faq_q_'.$faq->id.'"> ' . $faq->question . ' </option>';

                                        if($checkClose && $lastCategory != $faq->category){
                                            echo ' </optgroup>';
                                           $lastCategory = $faq->category;
                                        }
                                    }
                                ?>
                            @endforeach
                        </select>

                        <div class="lessee">

                            <br>

                        @foreach($faqs as $faq)
                            <?php
                            if($faq->section === "lessee") {
                                echo ' <div class="div_question" id="faq_q_'.$faq->id.'" style="display: none; text-align: justify"> ' . $faq->answer . ' </div>';
                            }
                            ?>
                        @endforeach
                        </div>

                        <?php
                        $lastSection = '';
                        $lastCategory = '';
                        $checkClose = false;

                        $faq = \App\models\FAQs::get();
                        $sections = $faq->pluck('section')->toArray();
                        $categories = $faq->pluck('category')->toArray();

                        $sections = array_unique($sections);
                        $categories = array_unique($categories);

                        ?>

                        <select id="section" class="form-control lessor" style="width: auto; display: none;"  onchange="showAnswer(this)">
                            <option value="0">Select Question</option>
                            @foreach($faqs as $faq)
                                <?php

                                if($faq->section !== "lessee") {

                                    if($lastCategory != $faq->category){
                                        echo ' <optgroup label="' . strtoupper($faq->category) . '">';
                                        $lastCategory = $faq->category;
                                        $checkClose = false;
                                    }else{
                                        $checkClose = true;
                                    }

                                    echo ' <option value="faq_q_'.$faq->id.'"> ' . $faq->question . ' </option>';

                                    if($checkClose && $lastCategory != $faq->category){
                                        echo ' </optgroup>';
                                        $lastCategory = $faq->category;
                                    }
                                }
                                ?>
                            @endforeach
                        </select>

                        <div class="lessor">

                            <br>

                        @foreach($faqs as $faq)
                            <?php
                            if($faq->section !== "lessee") {
                                echo ' <div class="div_question" id="faq_q_'.$faq->id.'" style="display: none; text-align: justify"> ' . $faq->answer . ' </div>';
                            }
                            ?>
                        @endforeach
                        </div>
                        <br>

                        <br>


                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

<script type="text/javascript">

    function showAnswer(dd){
        var selected = $(dd).val();

        $('.div_question').hide();

        $('#'+selected).show();
    }

    function showQuestions(dd){

        var selected = $(dd).val();

        if(selected === 'lessee') {
            $('.lessee').show();
            $('.lessor').hide();
        } else {
            $('.lessee').hide();
            $('.lessor').show();
        }

    }


</script>