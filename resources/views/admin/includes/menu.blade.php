<ul class="sidebar-menu" data-widget="tree">
    @foreach( $menus as $menu )
    <li>
    	<a href="{{ route( $menu['name'] ) }}">
    		<i class="{{ $menu['icon'] }}"></i> 
    		<span>{{ $menu['title'] }}</span>
    	</a>
    </li>
    @endforeach
</ul>