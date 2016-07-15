@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">管理标签</div>

        <div class="panel-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                {!! implode('<br>', $errors->all()) !!}
            </div>
        @endif

        <table class="table table-striped">
          <tr class="row">
            <th class="col-lg-4">Article</th>
            <th class="col-lg-6">Tags</th>      
            <th class="col-lg-2">Add</th>
            <th class="col-lg-2"></th>

          </tr>
          @foreach ($articles as $article)
            <tr class="row">
              <td class="col-lg-4" style="word-break:break-all" >
                  <a href="{{ URL('admin/article/'.$article->id.'/edit') }}" target="_blank">
                      <h5><strong>{{ $article->title }}</h5> 
                  </a>                            
              </td>
              <td class="col-lg-6">
                  @foreach ($article->hasManyTags as $tag) 
                      <form action="{{ url('admin/tags/'.$tag->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn">{{ $tag->tag_name }}</button>
                      </form>
                       &nbsp;                    
                  @endforeach      
              </td>
              <form action="{{ url('admin/tags') }}" method="POST">
                {!! csrf_field() !!}
                <td class="col-lg-2">
                   <input type="hidden" name="article_id" value="{{ $article->id }}">
                   <input type="text" name="tag_name" class="form-control" placeholder="New tag" >                
                </td>
                <td class="col-lg-2">
                   <button class="btn btn-info" >Add</button>
                </td>
              </form>
            </tr>
          @endforeach
         
        </table>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection