<li{!! Route::current()->getName() == 'backend.user.view' ? ' class="active"' : '' !!}><a href="{{route('backend.user.view', ['id'=>$user->id])}}">View</a></li>
<li{!! Route::current()->getName() == 'backend.user.update' ? ' class="active"' : '' !!}><a href="{{route('backend.user.update', ['id'=>$user->id])}}">Update</a></li>
