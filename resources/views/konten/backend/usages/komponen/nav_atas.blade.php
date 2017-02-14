<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($usages_home)) class="active" @endif >
  	<a href="{!! route('backend.usages.index') !!}">
  		Home
  	</a>
  </li>
  <li role="presentation" @if(isset($usages_statistics)) class="active" @endif>
  	<a href="{!! route('backend.usages.statistics') !!}">
  		<i class="fa fa-bar-chart"></i> Statistics
  	</a>
  </li>
</ul>
<hr>