@extends('story-theme::layouts.editor')

@section('title') Post Pages @stop

@section('content')
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h1>Create Pages</h1>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div>

    <form action="/backend/cms/elements/pages/" method="POST" accept-charset="UTF-8">
      {{ csrf_field() }}

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#post-pages" aria-controls="post-pages" role="tab" data-toggle="tab">Post Content</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="post-pages" style="padding-top: 20px">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label>Post Title</label>
                <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group">
                <textarea class="editor" name="body"></textarea>
              </div>
            </div>
            <div class="col-md-4">

              <div class="panel panel-default">
                <div class="panel-heading">Translations</div>
                <table class="table">
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Indonesia</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">Page Detail</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label>Post Status</label>
                    <select id="post-slug" class="form-control" name="status">
                      <option value="">Select status</option>
                      <option value="DRAFT">Draft</option>
                      <option value="PUBLISHED">Published</option>
                      <option value="PENDING">Pending</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Post Category</label>
                    <select id="post-slug" class="form-control" name="status">
                      <option value="">Select status</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">Post Meta Information</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="meta_title">
                  </div>
                  <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="meta_description"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Meta Keyword</label>
                    <textarea class="form-control" name="meta_keyword"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <hr />

          <div class="from-group">
            <button class="btn btn-primary" type="submit">Save pages</button>
            <a href="/backend/cms/elements/pages/" class="btn btn-link">Back to articles</a>
          </div>
        </div>
      </div>
      <!-- End panes -->
    </form>
  </div>
</div>
@stop
