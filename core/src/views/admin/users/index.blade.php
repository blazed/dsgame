@extends('dsgame::admin.layout.main')

@section('content')
<div id="content" class="span10">

  <div class="sortable row-fluid">
    <div class="box span12">
      <div class="box-header" data-original-title>
        <h2><i class="icon-user"></i><span class="break"></span>Members</h2>
      </div>

      <div class="box-content">
        <table class="table table-striped bootstrap-datatable datatable table-hover">
          <thead>
            <tr>
              <th>Username</th>
              <th>Race</th>
              <th>Population</th>
              <th>Planets</th>
              <th>Last Visit</th>
              <th>Date registered</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{{ $user->username }}}
                <div><small>
                  <a href="#"><span class="label label-info">Add a note</span>
                </small></div>
              </td>
              <td class="center">{{{ $user->race }}}</td>
              <td class="center">{{{ $user->population }}}</td>
              <td class="center">{{{ $user->total_planets }}}</td>
              <td class="center">{{{ $user->last_login }}}</td>
              <td class="center">{{{ $user->created_at }}}</td>
              <td class="center">
                @if ($user->activated == 0)
                  <span class="label">Inactive</span>
                @elseif (Sentry::getUserProvider()->findById($user->id)->hasAccess('users'))
                  <span class="label label-success">Active</span>
                @elseif (Sentry::getUserProvider()->findById($user->id)->hasAccess('pending'))
                  <span class="label label-warning">Pending</span>
                @elseif (Sentry::getUserProvider()->findById($user->id)->hasAccess('banned'))
                  <span class="label label-danger">Banned</span>
                @endif
              </td>
              <td class="center">
                <div class="btn-group">
                  <a class="btn btn-mini" href="">edit</a>
                  <a id="modal-confirm" class="btn btn-mini btn-danger" href="">ban</a>
                  <a class="btn btn-mini btn-info">test</a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $users->links() }}
      </div>
    </div>
  
  </div>

</div>
@stop
