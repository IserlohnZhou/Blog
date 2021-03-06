@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">管理评论</div>

        <div class="panel-body">

        <table class="table table-striped">
          <tr class="row">
            <th class="col-lg-4">Content</th>
            <th class="col-lg-2">User</th>
            <th class="col-lg-4">Article</th>
            <th class="col-lg-1">Edit</th>
            <th class="col-lg-1">Delete</th>
          </tr>
   
          @foreach ($comments as $comment)
            <tr class="row">
                <td class="col-lg-4" style="word-break:break-all" >
                  {{ $comment->content }}          
              </td>
              <td class="col-lg-2">
                @if ($comment->website)
                  <a href="{{ $comment->website }}">
                    {{ $comment->nickname }}
                  </a>
                @else
                  {{ $comment->nickname }}
                @endif
                {{ $comment->email }}
              </td>
              <td class="col-lg-4">
                <a href="{{ URL('admin/article/'.$comment->article_id.'/edit') }}" target="_blank">
                      {{ App\Article::find($comment->article_id)->title }}
                </a>
              </td>
              <td class="col-lg-1">
                <a href="{{ URL('admin/comments/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
              </td>
              <td class="col-lg-1">
                <form action="{{ URL('admin/comments/'.$comment->id) }}" method="POST" style="display: inline;">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger">删除</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection