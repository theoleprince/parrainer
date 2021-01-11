@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Blog Comment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($blogComment, ['route' => ['blogComments.update', $blogComment->id], 'method' => 'patch']) !!}

                        @include('blog_comments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection