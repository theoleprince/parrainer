@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Test And Evaluation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($testAndEvaluation, ['route' => ['testAndEvaluations.update', $testAndEvaluation->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('test_and_evaluations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection